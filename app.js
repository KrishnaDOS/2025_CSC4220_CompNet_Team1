
import fetch from 'node-fetch'; 
import session from 'express-session';
import express from 'express';
import cors from 'cors';
import https from 'https';
import fs from 'fs';
import mysql from 'mysql2/promise';
import bcrypt from 'bcryptjs';
import path from 'path';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

const app = express();
const port = 3000;
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const pool = mysql.createPool({
    host: '127.0.0.1',
    user: 'webserver',
    password: 'Archery7115*',
    database: 'compnet2025',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});


// Enable CORS for specific origins
app.use(cors({
    origin: 'https://www.compnet2025.com', 
    methods: ['GET', 'POST', 'PUT', 'DELETE'],
    allowedHeaders: ['Content-Type', 'Authorization'],
    credentials: true
}));

// Middleware to parse JSON and URL-encoded data
app.use(express.json());
app.use(express.urlencoded({ extended: false }));

// Upload route
app.post('/upload', function(req, res) { 
    const params = new URLSearchParams({
        secret: 'SECRET',
        response: req.body['g-recaptcha-response'],
        remoteip: req.ip,
    });

    fetch('https://www.google.com/recaptcha/api/siteverify', {
        method: "POST",
        body: params,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            res.json({ captchaSuccess: true });
        } else {
            res.json({ captchaSuccess: false });
        }
    })
    .catch(error => {
        console.error('Error verifying reCAPTCHA:', error);
        res.status(500).json({ error: 'Internal Server Error' });
    });
});


// User registration endpoint
app.post('/register', async (req, res) => {
    const { username, email, password } = req.body;

    try {
        const hashedPassword = await bcrypt.hash(password, 10);
        const [result] = await pool.query(
            'INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)',
            [username, email, hashedPassword]
        );

        res.status(201).json({ message: 'User registered successfully' });
    } catch (error) {
        console.error('Error registering user:', error);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});

app.use(session({
    secret: 'SECRET', // Replace with a strong secret key
    resave: false,
    saveUninitialized: true,
    cookie: {
        secure: true, // Set to true if using HTTPS
        httpOnly: true, // Prevent client-side JavaScript from accessing the cookie
        maxAge: 1000 * 60 * 60 * 24, // Session duration (e.g., 1 day)
        sameSite: 'strict',
    }
}));

// User login endpoint
app.post('/login', async (req, res) => {
    const { username, password } = req.body;

    try {
        const [rows] = await pool.query('SELECT * FROM users WHERE username = ?', [username]);
        if (rows.length === 0) {
            return res.status(401).json({ error: 'Invalid username or password' });
        }

        const user = rows[0];
        const isValidPassword = await bcrypt.compare(password, user.password_hash);
        if (!isValidPassword) {
            return res.status(401).json({ error: 'Invalid username or password' });
        }

        req.session.userId = user.id;
        req.session.username = user.username;

        console.log('Session created:', req.session); // Log session creation

        res.json({ message: 'Login successful', user: { id: user.id, username: user.username } });
    } catch (error) {
        console.error('Error logging in:', error);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});

// Middleware to check if the user is logged in
function isLoggedIn(req, res, next) {
    if (req.session.userId) {
        next(); // User is logged in, proceed to the next middleware/route
    } else {
        return res.redirect('www.compnet2025.com/login'); 
    }
}



app.get('/dashboard', isLoggedIn, (req, res) => {
    // Fetch user-specific data from the database
    const userId = req.session.userId;
    const username = req.session.username;

    res.json({ message: `Welcome to your dashboard, ${username}!`, userId });
    console.log('Session after login:', req.session);
});

// Logout endpoint
app.post('/logout', (req, res) => {
    req.session.destroy((err) => {
        if (err) {
            console.error('Error destroying session:', err);
            return res.status(500).json({ error: 'Internal Server Error' });
        }
        res.json({ message: 'Logout successful' });
    });
});

// Route to serve secret.html only to logged-in users
app.get('/secretFunct', isLoggedIn, (req, res) => {
    const filePath = path.join(__dirname, '..', 'private', 'secret.html');
    console.log('Attempting to read file at:', filePath);
    fs.readFile(filePath, 'utf8', (err, data) => {
        if (err) {
            console.error('Error reading secret.html:', err);
            return res.status(500).send('Internal Server Error');
        }
        res.set('Cache-Control', 'no-store, no-cache, must-revalidate, private');
        res.send(data);
    });
});

const options = {
    key: fs.readFileSync('certs/compnet2025.com_private_key.key'),
    cert: fs.readFileSync('certs/compnet2025.com_ssl_certificate.cer'),
};

https.createServer(options, app).listen(port, () => {
    console.log('HTTPS server running on port ' + port);
});


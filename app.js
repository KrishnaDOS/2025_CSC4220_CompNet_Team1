
import fetch from 'node-fetch'; // Add this linec
import express from 'express';
import cors from 'cors';
import https from 'https';
import fs from 'fs';
const app = express();
const port = 3000;


// Enable CORS for specific origins
app.use(cors({
    origin: 'https://www.compnet2025.com', // Allow all origins (for debugging only)
    methods: ['GET', 'POST', 'PUT', 'DELETE'],
    allowedHeaders: ['Content-Type', 'Authorization'],
}));

// Middleware to parse JSON and URL-encoded data
app.use(express.json());
app.use(express.urlencoded({ extended: false }));

// Upload route
app.post('/upload', function(req, res) { 
    const params = new URLSearchParams({
        secret: 'SECRET CODE',
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

const options = {
    key: fs.readFileSync('certs/compnet2025priv.key'),
    cert: fs.readFileSync('certs/compnet2025priv.cer'),
};

https.createServer(options, app).listen(port, () => {
    console.log('HTTPS server running on port ' + port);
});

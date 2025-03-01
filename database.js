import mysql from 'mysql2';
import express from 'express';


const pool = mysql.createPool({
    host: 'www.compnet2025.com',
    user: 'root',
    password: '',
    database: 'mysql'
}).promise()

const result = await pool.query("SELECT * FROM notes")
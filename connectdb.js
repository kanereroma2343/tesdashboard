const mysql = require('mysql2');

// Modify the credentials with your actual MySQL database details
const connection = mysql.createConnection({
  host: 'localhost',   // e.g., 'localhost' or remote server address
  user: 'root',   // e.g., 'root'
  password: '', // e.g., 'your-password'
  database: 'tesdashboard' // e.g., 'my_database'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to the MySQL database:', err);
    return;
  }
  console.log('Connected to the MySQL database!');
});

module.exports = connection;

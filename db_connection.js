const express = require('express');
const bcrypt = require('bcrypt');
const mysql = require('mysql2/promise');
const session = require('express-session');

const app = express();
app.use(express.urlencoded({ extended: true }));
app.use(session({
  secret: 'your-secret',
  resave: false,
  saveUninitialized: true,
}));

const connection = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'tesdashboard'
});

app.post('/login', async (req, res) => {
  const { username, password } = req.body;
  try {
    const [rows] = await connection.execute("SELECT password, role FROM users WHERE username = ?", [username]);

    if (rows.length > 0) {
      const { password: hashedPassword, role } = rows[0];
      const match = await bcrypt.compare(password, hashedPassword);

      if (match) {
        req.session.username = username;
        req.session.role = role;

        if (role === 'admin') {
          return res.redirect('/a_dashboard.php');
        }
        return res.redirect('/dashboard');
      }
    }
    res.send('Invalid username or password');
  } catch (error) {
    res.status(500).send('Server error');
  }
});

app.listen(3000, () => {
  console.log('Server running on port 3000');
});

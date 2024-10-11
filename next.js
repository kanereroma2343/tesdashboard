import mysql from 'mysql2/promise';

export default async function handler(req, res) {
  const connection = await mysql.createConnection(process.env.DATABASE_URL);
  const [rows] = await connection.execute('SELECT * FROM tesdashboard');
  res.status(200).json(rows);
}

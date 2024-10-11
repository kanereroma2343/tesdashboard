// Import necessary libraries and components
import React from 'react';
import { createClient } from '@vercel/postgres'; // Use the appropriate client for your database
import { Post } from '../types'; // Adjust the path based on your project structure

// Create a Postgres client instance
const client = createClient({
  connectionString: process.env.DATABASE_URL, // Your database connection string from environment variables
});

// Define a functional component for the page
const Page: React.FC = () => {
  const [posts, setPosts] = React.useState<Post[]>([]);
  const [loading, setLoading] = React.useState(true);

  // Fetch data from the database on component mount
  React.useEffect(() => {
    const fetchPosts = async () => {
      try {
        const { rows } = await client.query('SELECT * FROM posts'); // Adjust query based on your table name
        setPosts(rows);
      } catch (error) {
        console.error('Error fetching data:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchPosts();
  }, []);

  // Render the page content
  return (
    <div>
      <h1>Posts</h1>
      {loading ? (
        <p>Loading...</p>
      ) : (
        <ul>
          {posts.map((post) => (
            <li key={post.id}>{post.title}</li> // Adjust based on your post structure
          ))}
        </ul>
      )}
    </div>
  );
};

export default Page;

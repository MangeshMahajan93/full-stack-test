# Answers to Technical Questions

1. How long did you spend on the coding test? What would you add to your solution if you had more time?

I spent approximately 6 to 7 hours on the coding test. 
If I had more time, I would:
- Improve the UI/UX by refining the design and animations for a smoother experience.
- Implement server-side validation to enhance security and data integrity.
- Add pagination for better performance when handling large datasets.
- Implement image compression while uploading to optimize storage and speed.
- Write unit tests for the CRUD operations to ensure reliability.


2. How would you track down a performance issue in production? Have you ever had to do this?
To track down a performance issue in production, I would follow these steps:
1. Identify the bottleneck  
   - Use monitoring tools (e.g., New Relic, Datadog) to analyze slow API requests.
   - Check server logs and database logs for slow queries.
   - Use Chrome DevTools or Lighthouse for frontend performance issues.

2. Analyze database performance  
   - Enable query logging and check for slow queries using `EXPLAIN` in MySQL.
   - Optimize indexes and avoid unnecessary full-table scans.

3. Optimize backend code  
   - Profile the application with Xdebug to find slow PHP functions.
   - Optimize loops, reduce redundant computations, and implement lazy loading.

4. Check server performance  
   - Analyze CPU and memory usage (`htop`, `top`, `free -m`).
   - Adjust server configurations (e.g., PHP-FPM settings, Apache/Nginx optimizations).

I have resolved performance issues in production environments, mainly by optimizing SQL queries, reducing API response times, and improving caching strategies.


3. Please describe yourself using JSON.

```json
{
  "name": "Mangesh Shrikant Mahajan",
  "birth_date": "1993-07-23",
  "profession": "Senior Full-Stack Developer",
  "skills": [
    "PHP",
    "Node.js",
    "MySQL",
    "MongoDB",
    "Angular",
    "JavaScript",
    "TypeScript",
    "CodeIgniter 4",
    "Express.js",
    "Bootstrap",
    "jQuery"
  ],
  "experience": {
    "years": 6,
    "domains": ["Healthcare", "Education", "Publishing & Media"]
  },
  "preferences": {
    "frontend_framework": "Angular",
    "backend_framework": "Node.js (Express), PHP (CodeIgniter)",
    "database": "MySQL"
  },
  "goals": [
    "Continuous learning",
    "Master new technologies",
    "Achieve success in career and personal life"
  ],
  "personal_values": ["Hard work", "Self-belief", "Faith in God"],
  "location": "Pune, India",
  "hobbies": ["Exploring new technologies", "Problem-solving"]
}
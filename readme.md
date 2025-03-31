## RUN APPLICATION

### Prerequisites
Ensure you have the following installed on your system:
- **Docker** (latest version recommended)
- **Docker Compose**

### Steps to Run the Application
1. **Clone the repository**
   ```sh
   git clone git@github.com:buihoanghai/wager.git
   cd wager
   ```
2. **Build the Docker images (without cache)**
   ```sh
   docker compose build --no-cache
   ```
3. **Start the services in detached mode**
   ```sh
   docker compose up -d
   ```
4. **Run the startup script**
   ```sh
   ./start.sh
   ```

### Access the Application
- **Host URL:** [http://localhost:8081](http://localhost:8081)



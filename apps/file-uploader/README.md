# File Uploader Blueprint 📂

A Dockerized PHP application running on an Apache web server, designed to handle multi-format file uploads. This service is ideal for testing persistent volumes in Kubernetes or local Docker storage drivers.

---

## 🛠️ Architecture & Stack
* **Base Image:** PHP with Apache (Debian-based)
* **Web Server:** Apache (Custom configuration via `apache.conf`)
* **Persistence:** Local `uploads/` directory



---

## 🚀 Build & Run Instructions

From the root of the `file-uploader` directory, execute the following:

### 1. Build the Image

```bash
docker build -t file-uploader:v1 .
```
---
### 2. Run the Container

```bash
docker run -d \
  -p 8080:80 \
  --name uploader-service \
  -v $(pwd)/uploads:/var/www/html/uploads \
  file-uploader:v1

```
> [!TIP]
> Access the app at: `http://localhost:8080`

---


## 📂 File Description & Usage

Each file in this directory plays a specific role in building and configuring the containerized environment.

| File | Role |
| :--- | :--- |
| **Dockerfile** | Defines the base environment, installs OS dependencies, and sets folder permissions. |
| **index.php** | Contains the core application logic for the upload form and server-side file processing. |
| **apache.conf** | Custom configuration to override default Apache settings for specific upload limits. |
| **.htaccess** | Provides directory-level security and enables URL rewriting rules. |
| **/uploads** | The target directory for all uploaded files (Persisted via volumes and Ignored by Git). |

---
---

## 🔍 Troubleshooting

If you encounter issues during deployment or usage, check the following common solutions:

### 1. Permission Denied
If the application is unable to write files to the `uploads` directory, it is likely a Linux permission issue. Ensure your **Dockerfile** sets the correct owner for the Apache process:

```bash
# Execute this within the container or via Dockerfile
chown -R www-data:www-data /var/www/html/uploads
```
> [!TIP]
> Large Files: If uploads fail for large files, check the `post_max_size` in your PHP configuration.




# Container Lab Suite 🐳

A centralized repository for various Dockerized applications. Each folder within `/apps` contains a standalone service with its own `Dockerfile` and configuration dependencies.

---

## 📂 Available Applications

| Application | Description | Path |
| :--- | :--- | :--- |
| **File Uploader** | PHP/Apache service for testing file persistence. | `/apps/file-uploader` |

---

## 🚀 Usage Pattern

To build any application in this suite, navigate to the specific application folder:

```bash
cd apps/file-uploader
docker build -t file-uploader:v1 .
```
---

## 🛠️ Global Requirements

Before building or deploying the blueprints in this repository, ensure your environment meets the following technical specifications:

* **Docker:** Version **20.10+** (Required for buildkit and modern manifest support).
* **Container Registry:** (Optional) A valid account on **Docker Hub** or **GitHub Container Registry (GHCR)** if you plan to push these images for use in Kubernetes (K8s) deployments.

---

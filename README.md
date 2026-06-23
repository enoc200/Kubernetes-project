

# Kubernetes PHP + MySQL Student Management System

## Overview

This project is a containerized **Student Management System** built using:

* PHP (Frontend + Backend logic)
* MySQL (Database)
* phpMyAdmin (Database GUI)
* Kubernetes (Orchestration using Minikube)
* Docker (Container images)

It demonstrates full DevOps workflow:

* Containerization
* Deployment on Kubernetes
* Scaling
* Self-healing
* Persistent storage

---



# System Architecture Explanation

The system follows a **3-tier architecture**:

### 1. Presentation Layer

* PHP Web Application (`student-app`)
* Handles UI:

  * Homepage
  * Student registration
  * Login pages

### 2. Application Layer

* PHP logic communicates with MySQL
* Configured using:

  * ConfigMap (environment variables)
  * Secrets (DB credentials)

### 3. Data Layer

* MySQL Database
* Stores:

  * Students
  * Users
* Uses PersistentVolumeClaim (PVC) for data persistence

---

# Kubernetes Components

### 🔹 Deployments

* student-app
* mysql
* phpmyadmin

### 🔹 Services

* NodePort → student-app
* ClusterIP → mysql
* NodePort → phpmyadmin

### 🔹 ConfigMap

Stores:

* DB_HOST=mysql
* DB_NAME=studentdb
* APP_ENV=development

### 🔹 Secret

Stores:

* MySQL username
* MySQL password

### 🔹 PVC

* Ensures MySQL data persists even after pod restarts

---

# Access URLs (Minikube)

```bash
minikube service student-app
minikube service phpmyadmin
```

Or:

* Student App → `http://<minikube-ip>:30080`
* phpMyAdmin → `http://<minikube-ip>:30081`

---

# How to Run

## 1. Start Minikube

```bash
minikube start --driver=docker
```

## 2. Apply Kubernetes files

```bash
kubectl apply -f kubernetes/
```

## 3. Verify resources

```bash
kubectl get pods
kubectl get svc
kubectl get pvc
```

---

# Scaling

Scale application to 3 replicas:

```bash
kubectl scale deployment student-app --replicas=3
```

Verify:

```bash
kubectl get pods
```

---

# Self-Healing Demo

Delete a pod:

```bash
kubectl delete pod <student-app-pod>
```

Kubernetes automatically recreates it.

---

# Database Access

Use phpMyAdmin:

* Server: `mysql`
* Username: from Secret
* Password: from Secret

---

# Key Features Demonstrated

* ✔ Kubernetes Deployments
* ✔ Services (NodePort & ClusterIP)
* ✔ ConfigMaps
* ✔ Secrets
* ✔ Persistent Volumes
* ✔ Scaling (Horizontal Pods)
* ✔ Self-healing
* ✔ Containerized PHP App

---



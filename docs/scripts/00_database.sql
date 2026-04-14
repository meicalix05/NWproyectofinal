CREATE SCHEMA `ecommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
// Propuesta de nombre de base de datos: floristeria

-- =========================
-- CREATE DATABASE floreria_db;
USE floreria_db;

-- =========================
-- TABLA ROLES
-- =========================
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- =========================
-- TABLA USUARIOS
-- =========================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255),
    role_id INT,
    estado TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- =========================
-- TABLA CATEGORIAS
-- =========================
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    estado TINYINT DEFAULT 1
);

-- =========================
-- TABLA PRODUCTOS
-- =========================
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150),
    descripcion TEXT,
    precio DECIMAL(10,2),
    stock INT,
    imagen VARCHAR(255),
    category_id INT,
    estado TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- =========================
-- TABLA CARRITO
-- =========================
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- =========================
-- TABLA ITEMS DEL CARRITO
-- =========================
CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    FOREIGN KEY (cart_id) REFERENCES cart(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- =========================
-- TABLA METODOS DE PAGO
-- =========================
CREATE TABLE payment_methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

-- =========================
-- TABLA TRANSACCIONES
-- =========================
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    codigo_transaccion VARCHAR(100),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2),
    metodo_pago_id INT,
    estado VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (metodo_pago_id) REFERENCES payment_methods(id)
);

-- =========================
-- TABLA DETALLE TRANSACCION
-- =========================
CREATE TABLE transaction_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT,
    product_id INT,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    FOREIGN KEY (transaction_id) REFERENCES transactions(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
*/
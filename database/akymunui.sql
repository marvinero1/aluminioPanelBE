-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para aluminiobd
CREATE DATABASE IF NOT EXISTS `aluminiobd` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `aluminiobd`;
-- Volcando estructura de base de datos para aluminiobd
CREATE DATABASE IF NOT EXISTS `aluminiobd` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `aluminiobd`;
-- Volcando estructura para tabla aluminiobd.calculadoras
CREATE TABLE IF NOT EXISTS `calculadoras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero1` double(8,2) DEFAULT NULL,
  `numero2` double(8,2) DEFAULT NULL,
  `resultado` double(8,2) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.calculadoras: ~1 rows (aproximadamente)
DELETE FROM `calculadoras`;
/*!40000 ALTER TABLE `calculadoras` DISABLE KEYS */;
INSERT INTO `calculadoras` (`id`, `numero1`, `numero2`, `resultado`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(2, 25.50, 25.50, 650.30, NULL, NULL, '2021-05-20 17:59:19', '2021-05-20 17:59:19');
/*!40000 ALTER TABLE `calculadoras` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.calculadora_historials
CREATE TABLE IF NOT EXISTS `calculadora_historials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_suma` double(8,2) DEFAULT NULL,
  `nombre_operacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` double(8,2) DEFAULT NULL,
  `total_extra` double(8,2) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_calculadora_historials_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.calculadora_historials: ~0 rows (aproximadamente)
DELETE FROM `calculadora_historials`;
/*!40000 ALTER TABLE `calculadora_historials` DISABLE KEYS */;
INSERT INTO `calculadora_historials` (`id`, `total_suma`, `nombre_operacion`, `descripcion`, `extra`, `total_extra`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(12, 650.30, 'AAA', 'JKL', 6503.00, 10.00, 1, NULL, '2021-05-20 18:00:37', '2021-05-20 18:00:37');
/*!40000 ALTER TABLE `calculadora_historials` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carritos_users` (`user_id`),
  CONSTRAINT `FK_carritos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.carritos: ~1 rows (aproximadamente)
DELETE FROM `carritos`;
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
INSERT INTO `carritos` (`id`, `estado`, `importadora`, `descripcion`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(19, 'false', 'empresa', 'SDFSDFSDFSD', 2, NULL, '2021-05-25 07:58:24', '2021-05-25 07:58:24');
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.carrito_detalles
CREATE TABLE IF NOT EXISTS `carrito_detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad_pedido` int(11) DEFAULT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) DEFAULT '0.00',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ancho` double DEFAULT '0',
  `alto` double DEFAULT '0',
  `codigo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tipo_medida` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `carro_id` bigint(20) unsigned NOT NULL,
  `categorias_id` bigint(20) unsigned NOT NULL,
  `subcategorias_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_detalles_carro_id_foreign` (`carro_id`),
  CONSTRAINT `carrito_detalles_carro_id_foreign` FOREIGN KEY (`carro_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.carrito_detalles: ~2 rows (aproximadamente)
DELETE FROM `carrito_detalles`;
/*!40000 ALTER TABLE `carrito_detalles` DISABLE KEYS */;
INSERT INTO `carrito_detalles` (`id`, `cantidad_pedido`, `importadora`, `nombre`, `imagen`, `precio`, `color`, `ancho`, `alto`, `codigo`, `descripcion`, `tipo_medida`, `carro_id`, `categorias_id`, `subcategorias_id`, `created_at`, `updated_at`) VALUES
	(6, 5, 'empresa', 'ARTICULO', 'images/productos/9-093328-4.jpg', 499.97, 'titanio', NULL, NULL, '8701', 'SDFSDFSDFSD', 'Selecciona...', 19, 1, 1, '2021-05-25 07:58:32', '2021-05-25 07:58:32');
/*!40000 ALTER TABLE `carrito_detalles` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.categorias: ~0 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `user`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Carrocería de automóviles', 'Carrocería de automóviles asdqwezxcrtyfghvbn', 'admin', NULL, '2021-05-19 02:08:46', '2021-05-19 02:08:46');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.favoritos
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmacion` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `productos_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoritos_user_id_foreign` (`user_id`),
  KEY `favoritos_productos_id_foreign` (`productos_id`),
  CONSTRAINT `favoritos_productos_id_foreign` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favoritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.favoritos: ~0 rows (aproximadamente)
DELETE FROM `favoritos`;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` (`id`, `nombre`, `precio`, `color`, `confirmacion`, `codigo`, `imagen`, `importadora`, `user_id`, `productos_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'ARTICULO', 499.97, 'Amarillo, Plomo, Rosado', 'true', '8701', 'images/productos/9-093328-4.jpg', 'empresa', 2, 43, NULL, '2021-05-24 00:07:23', '2021-05-24 00:07:23');
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.migrations: ~20 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_11_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(6, '2016_06_01_000004_create_oauth_clients_table', 1),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2020_12_23_181825_create_categorias_table', 1),
	(10, '2021_01_04_014926_create_subcategorias_table', 1),
	(11, '2021_01_04_037311_create_productos_table', 1),
	(12, '2021_01_04_037317_create_favoritos_table', 1),
	(13, '2021_02_20_204303_create_subscripcions_table', 1),
	(14, '2021_02_20_204421_create_novedads_table', 1),
	(15, '2021_02_21_221458_create_pedidos_table', 1),
	(16, '2021_03_22_175213_create_pedido_realizados_table', 1),
	(17, '2021_03_22_193127_create_carritos_table', 1),
	(18, '2021_03_23_011606_create_carrito_detalles_table', 1),
	(19, '2021_04_02_211333_create_calculadoras_table', 1),
	(20, '2021_05_19_011117_create_calculadora_historials_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.novedads
CREATE TABLE IF NOT EXISTS `novedads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.novedads: ~0 rows (aproximadamente)
DELETE FROM `novedads`;
/*!40000 ALTER TABLE `novedads` DISABLE KEYS */;
/*!40000 ALTER TABLE `novedads` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.oauth_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `oauth_access_tokens`;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.oauth_auth_codes: ~0 rows (aproximadamente)
DELETE FROM `oauth_auth_codes`;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.oauth_clients: ~0 rows (aproximadamente)
DELETE FROM `oauth_clients`;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.oauth_personal_access_clients: ~0 rows (aproximadamente)
DELETE FROM `oauth_personal_access_clients`;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.oauth_refresh_tokens: ~0 rows (aproximadamente)
DELETE FROM `oauth_refresh_tokens`;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `carrito_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pedidos_users` (`user_id`),
  KEY `FK_pedidos_carritos` (`carrito_id`),
  CONSTRAINT `FK_pedidos_carritos` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_pedidos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.pedidos: ~1 rows (aproximadamente)
DELETE FROM `pedidos`;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.pedido_realizados
CREATE TABLE IF NOT EXISTS `pedido_realizados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmacion` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ancho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntuacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponibilidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_medida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad_pedido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorias_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategorias_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favoritos_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.pedido_realizados: ~0 rows (aproximadamente)
DELETE FROM `pedido_realizados`;
/*!40000 ALTER TABLE `pedido_realizados` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_realizados` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmacion` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ancho` double(8,2) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alto` double(8,2) DEFAULT NULL,
  `novedad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntuacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importadora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponibilidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_medida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `categorias_id` bigint(20) unsigned NOT NULL,
  `subcategorias_id` bigint(20) unsigned NOT NULL,
  `favoritos_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_user_id_foreign` (`user_id`),
  KEY `productos_categorias_id_foreign` (`categorias_id`),
  KEY `productos_subcategorias_id_foreign` (`subcategorias_id`),
  CONSTRAINT `productos_categorias_id_foreign` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productos_subcategorias_id_foreign` FOREIGN KEY (`subcategorias_id`) REFERENCES `subcategorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.productos: ~13 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `confirmacion`, `imagen`, `precio`, `color`, `ancho`, `codigo`, `alto`, `novedad`, `puntuacion`, `descripcion`, `importadora`, `disponibilidad`, `tipo_medida`, `user_id`, `categorias_id`, `subcategorias_id`, `favoritos_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Carrocería de automóviles', 'false', 'images/productos/10-021543-9.jpg', 2500.00, 'Plomo', NULL, '000-GTV-032', NULL, NULL, '5', 'dadasdasdasd', 'admin', NULL, 'Selecciona...', 1, 1, 1, NULL, NULL, '2021-05-19 02:15:43', '2021-05-19 02:15:43'),
	(2, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(3, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(42, 'ARTICULO', 'false', 'images/productos/9-093328-4.jpg', 499.97, 'Amarillo, Plomo, Rosado', NULL, '8701', NULL, NULL, '5', 'SDFSDFSDFSD', 'empresa', 'La-Paz, Cochabamba, Santa-Cruz', 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 21:33:28', '2021-05-22 21:33:28'),
	(43, 'ARTICULO', 'false', 'images/productos/9-093328-4.jpg', 499.97, 'Amarillo, Plomo, Rosado', NULL, '8701', NULL, NULL, '5', 'SDFSDFSDFSD', 'empresa', 'La-Paz, Cochabamba, Santa-Cruz', 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 21:33:28', '2021-05-22 21:33:28'),
	(44, 'ARTICULO', 'false', 'images/productos/9-093328-4.jpg', 499.97, 'Amarillo, Plomo, Rosado', NULL, '8701', NULL, NULL, '5', 'SDFSDFSDFSD', 'empresa', 'La-Paz, Cochabamba, Santa-Cruz', 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 21:33:28', '2021-05-22 21:33:28'),
	(45, 'ARTICULO', 'false', 'images/productos/9-093328-4.jpg', 499.97, 'Amarillo, Plomo, Rosado', NULL, '8701', NULL, NULL, '5', 'SDFSDFSDFSD', 'empresa', 'La-Paz, Cochabamba, Santa-Cruz', 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 21:33:28', '2021-05-22 21:33:28'),
	(46, 'ARTICULO', 'false', 'images/productos/9-093328-4.jpg', 499.97, 'Amarillo, Plomo, Rosado', NULL, '8701', NULL, NULL, '5', 'SDFSDFSDFSD', 'empresa', 'La-Paz, Cochabamba, Santa-Cruz', 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 21:33:28', '2021-05-22 21:33:28'),
	(47, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(48, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(49, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(50, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46'),
	(51, 'Perfiles de Aluminio', 'false', 'images/productos/10-033846-5.jpg', 540.00, 'Azul', NULL, '2024', NULL, NULL, '5', 'asdsdsdasd', 'empresa', NULL, 'Selecciona...', 2, 1, 1, NULL, NULL, '2021-05-22 15:38:46', '2021-05-22 15:38:46');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorias_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategorias_categorias_id_foreign` (`categorias_id`),
  CONSTRAINT `subcategorias_categorias_id_foreign` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.subcategorias: ~0 rows (aproximadamente)
DELETE FROM `subcategorias`;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` (`id`, `nombre`, `descripcion`, `categorias_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Carrosa de aluminio para automoviles', 'asdasdasdasd', 1, NULL, '2021-05-19 02:14:25', '2021-05-19 02:14:25');
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.subscripcions
CREATE TABLE IF NOT EXISTS `subscripcions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.subscripcions: ~0 rows (aproximadamente)
DELETE FROM `subscripcions`;
/*!40000 ALTER TABLE `subscripcions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscripcions` ENABLE KEYS */;

-- Volcando estructura para tabla aluminiobd.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscripcion` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin','empresa','vendedor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aluminiobd.users: ~2 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `apellido`, `direccion`, `telefono`, `fecha_inicio`, `fecha_fin`, `pais`, `ciudad`, `whatsapp`, `registrado`, `nit`, `email`, `subscripcion`, `imagen`, `remember_token`, `email_verified_at`, `password`, `role`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, 'Av.America 1684', '76964607', NULL, NULL, 'Bolivia', 'Cochabamba', NULL, NULL, '234234', 'admin@gmail.com', 'false', 'images/default-person.jpg', NULL, NULL, '$2y$10$LngISkm/ujNnj4DmacE6Ruy5fhnML./IvmJmfVD7R26SVr5Ufw22u', 'admin', NULL, '2021-05-19 01:59:45', '2021-05-19 01:59:45'),
	(2, 'empresa', NULL, 'Av.America 1684', '76964607', NULL, NULL, 'Bolivia', 'Cochabamba', NULL, NULL, '24234', 'empresa@gmail.com', 'false', 'images/default-person.jpg', NULL, NULL, '$2y$10$Eo9Pa.10fCy99Do8oN0OeemRVpCJi6UffSI4Pwb/F6rwhSZzGuHZ2', 'empresa', NULL, '2021-05-19 02:01:03', '2021-05-19 02:01:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 07:57:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fielpvs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(12, 'Presidente', '2024-05-27 00:44:36', '2024-05-27 00:44:36'),
(13, 'Vicepresidente', '2024-05-27 00:44:51', '2024-05-27 00:44:51'),
(14, 'Secretario (a)', '2024-05-27 00:45:01', '2024-05-27 00:45:01'),
(15, 'Secretario (a) adjunto (a)', '2024-05-27 00:45:22', '2024-05-27 00:45:22'),
(16, 'Tesorero (a)', '2024-05-27 00:45:33', '2024-05-27 00:45:33'),
(17, 'Tesorero (a) adjunto (a)', '2024-05-27 00:45:47', '2024-05-27 00:45:47'),
(18, 'Vocal', '2024-05-27 00:46:10', '2024-05-27 08:26:41'),
(19, 'Primer Comandante', '2024-05-27 00:50:23', '2024-05-27 01:04:10'),
(20, 'Segundo comandante', '2024-05-27 00:51:00', '2024-05-27 01:04:38'),
(21, 'Comandante adulto', '2024-05-27 00:51:54', '2024-05-27 01:06:06'),
(22, 'Comandante juvenil', '2024-05-27 00:53:51', '2024-05-27 01:07:22'),
(23, 'Comandante junior\'s', '2024-05-27 00:55:08', '2024-05-27 01:06:35'),
(24, 'Tesorería', '2024-05-27 00:56:40', '2024-05-27 01:07:52'),
(25, 'Intendencia', '2024-05-27 00:59:02', '2024-05-27 01:08:16'),
(26, 'Secretaria', '2024-05-27 01:01:47', '2024-05-27 01:09:01'),
(27, 'Jefe de operaciones', '2024-05-27 01:09:42', '2024-05-27 01:09:42'),
(28, 'Jefe de adiestramiento', '2024-05-27 01:09:54', '2024-05-27 01:09:54'),
(29, 'Jefe de instrucción', '2024-05-27 01:10:58', '2024-05-27 01:10:58'),
(30, 'Director Nacional', '2024-05-27 01:11:35', '2024-05-27 01:11:35'),
(31, 'Subdirector Académico', '2024-05-27 01:11:49', '2024-05-27 01:11:49'),
(32, 'Subdirector Administrativo', '2024-05-27 01:12:03', '2024-05-27 01:12:03'),
(33, 'Miembro', '2024-05-27 01:38:17', '2024-05-27 08:11:12'),
(34, 'Superintendente', '2024-05-27 15:30:46', '2024-05-27 15:30:46'),
(35, 'Vice-intendente', '2024-05-27 15:31:18', '2024-05-27 15:31:18'),
(36, 'Tesorero de ASOMIN', '2024-05-27 15:33:46', '2024-05-27 15:33:46'),
(37, 'Presbítero', '2024-05-27 15:34:14', '2024-05-27 15:34:14'),
(38, 'Vice-presbítero', '2024-05-27 15:34:34', '2024-05-27 15:34:34'),
(39, 'Supervisor de Zona', '2024-05-27 15:35:11', '2024-05-27 15:35:11'),
(40, 'Vice-supervisor', '2024-05-27 15:35:29', '2024-05-27 15:35:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_actual`
--

CREATE TABLE `cargo_actual` (
  `registro_id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_ungidos`
--

CREATE TABLE `categoria_ungidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_ungidos`
--

INSERT INTO `categoria_ungidos` (`id`, `id_registro`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 121, 'ANCIANO NACIONAL', '2024-05-30 08:56:41', '2024-05-30 08:56:41'),
(2, 122, 'ANCIANO NACIONAL', '2024-05-31 07:24:41', '2024-05-31 07:24:41'),
(3, 123, 'ANCIANO NACIONAL', '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(5, 125, 'ANCIANO NACIONAL', '2024-06-13 07:16:23', '2024-06-13 07:16:23'),
(7, 127, 'ANCIANO NACIONAL', '2024-06-14 09:10:59', '2024-06-14 09:10:59'),
(9, 129, 'ANCIANO NACIONAL', '2024-06-14 09:35:16', '2024-06-14 09:35:16'),
(16, 128, 'ANCIANO REGIONAL', '2024-06-14 10:12:31', '2024-06-14 10:12:31'),
(24, 126, 'selected', '2024-06-16 08:16:00', '2024-06-16 08:16:00'),
(27, 124, 'selected', '2024-06-16 09:21:46', '2024-06-16 09:21:46'),
(28, 131, 'DIRECTIVO PRESBITERIO REGIONAL', '2024-06-16 09:31:07', '2024-06-16 09:31:07'),
(29, 99, 'ANCIANO NACIONAL', '2024-06-16 10:12:38', '2024-06-16 10:12:38'),
(30, 135, 'DIRECTIVO PRESBITERIO REGIONAL', '2024-06-16 10:35:06', '2024-06-16 10:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circuitos`
--

CREATE TABLE `circuitos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `circuitos`
--

INSERT INTO `circuitos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(3, 'GUARICO SUR', '2024-06-07 16:57:06', '2024-06-12 16:58:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(8, 'SONADAM (NACIONAL)', '2024-05-27 00:32:02', '2024-05-27 00:32:02'),
(9, 'SONADAM (REGIONAL)', '2024-05-27 00:32:30', '2024-05-27 00:32:30'),
(10, 'SONAJOV (NACIONAL)', '2024-05-27 00:33:00', '2024-05-27 00:34:21'),
(11, 'SONAJOV (REGIONAL)', '2024-05-27 00:34:55', '2024-05-27 00:34:55'),
(12, 'INTERCESIÓN (NACIONAL)', '2024-05-27 00:36:09', '2024-05-27 00:36:09'),
(13, 'INTERCESIÓN (REGIONAL)', '2024-05-27 00:36:22', '2024-05-27 00:36:22'),
(14, 'EVANGELISMO Y MISIONES (NACIONAL)', '2024-05-27 00:37:07', '2024-05-27 00:37:07'),
(15, 'EVANGELISMO Y MISIONES (REGIONAL)', '2024-05-27 00:37:37', '2024-05-27 00:37:37'),
(16, 'BESF (Cargos Nacionales)', '2024-05-27 00:41:10', '2024-05-27 00:42:48'),
(17, 'BESF (Cargos circuitales )', '2024-05-27 00:43:18', '2024-05-27 00:43:18'),
(18, 'IBFS', '2024-05-27 00:43:42', '2024-05-27 00:43:42'),
(19, 'ESCUELA DOMINICAL(NACIONAL)', '2024-05-27 15:30:06', '2024-05-27 15:30:06'),
(20, 'ESCUELA DOMINICAL (REGIONAL)', '2024-05-27 15:42:28', '2024-05-27 15:42:28'),
(21, 'DIRECTIVA NACIONAL DE LA FIELPVS', '2024-05-27 15:46:07', '2024-05-27 15:46:07'),
(22, 'DIRECTIVA DE PRESBITERIO', '2024-05-27 15:48:13', '2024-05-27 15:48:13'),
(23, 'DIRECTIVA DE ZONA NACIONAL', '2024-05-27 15:52:15', '2024-05-27 15:52:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia_cargos`
--

CREATE TABLE `dependencia_cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencia_cargos`
--

INSERT INTO `dependencia_cargos` (`id`, `id_dependencia`, `id_cargo`, `created_at`, `updated_at`) VALUES
(8, 8, 12, NULL, NULL),
(9, 8, 13, NULL, NULL),
(10, 8, 14, NULL, NULL),
(11, 8, 15, NULL, NULL),
(12, 8, 16, NULL, NULL),
(13, 8, 17, NULL, NULL),
(14, 8, 18, NULL, NULL),
(32, 8, 33, NULL, NULL),
(15, 9, 12, NULL, NULL),
(16, 9, 13, NULL, NULL),
(17, 9, 14, NULL, NULL),
(18, 9, 16, NULL, NULL),
(19, 9, 18, NULL, NULL),
(33, 9, 33, NULL, NULL),
(20, 10, 12, NULL, NULL),
(21, 10, 13, NULL, NULL),
(22, 10, 14, NULL, NULL),
(23, 10, 15, NULL, NULL),
(24, 10, 16, NULL, NULL),
(25, 10, 17, NULL, NULL),
(26, 10, 18, NULL, NULL),
(34, 10, 33, NULL, NULL),
(27, 11, 12, NULL, NULL),
(28, 11, 13, NULL, NULL),
(29, 11, 14, NULL, NULL),
(30, 11, 16, NULL, NULL),
(31, 11, 18, NULL, NULL),
(35, 11, 33, NULL, NULL),
(36, 12, 12, NULL, NULL),
(37, 12, 13, NULL, NULL),
(38, 12, 14, NULL, NULL),
(39, 12, 15, NULL, NULL),
(40, 12, 16, NULL, NULL),
(41, 12, 17, NULL, NULL),
(42, 12, 18, NULL, NULL),
(48, 12, 33, NULL, NULL),
(43, 13, 12, NULL, NULL),
(44, 13, 13, NULL, NULL),
(45, 13, 14, NULL, NULL),
(46, 13, 16, NULL, NULL),
(47, 13, 33, NULL, NULL),
(49, 14, 12, NULL, NULL),
(50, 14, 13, NULL, NULL),
(51, 14, 14, NULL, NULL),
(52, 14, 15, NULL, NULL),
(53, 14, 16, NULL, NULL),
(54, 14, 17, NULL, NULL),
(55, 14, 18, NULL, NULL),
(56, 14, 33, NULL, NULL),
(57, 15, 12, NULL, NULL),
(58, 15, 13, NULL, NULL),
(59, 15, 14, NULL, NULL),
(60, 15, 16, NULL, NULL),
(61, 15, 18, NULL, NULL),
(62, 16, 19, NULL, NULL),
(63, 16, 20, NULL, NULL),
(64, 16, 21, NULL, NULL),
(65, 16, 22, NULL, NULL),
(66, 16, 24, NULL, NULL),
(67, 16, 25, NULL, NULL),
(68, 16, 26, NULL, NULL),
(69, 16, 27, NULL, NULL),
(70, 16, 28, NULL, NULL),
(72, 16, 29, NULL, NULL),
(73, 17, 19, NULL, NULL),
(74, 17, 20, NULL, NULL),
(75, 17, 21, NULL, NULL),
(76, 17, 22, NULL, NULL),
(77, 17, 23, NULL, NULL),
(78, 17, 24, NULL, NULL),
(79, 17, 25, NULL, NULL),
(80, 17, 26, NULL, NULL),
(81, 17, 27, NULL, NULL),
(82, 17, 28, NULL, NULL),
(83, 17, 29, NULL, NULL),
(87, 18, 14, NULL, NULL),
(88, 18, 15, NULL, NULL),
(89, 18, 16, NULL, NULL),
(90, 18, 17, NULL, NULL),
(91, 18, 18, NULL, NULL),
(84, 18, 30, NULL, NULL),
(85, 18, 31, NULL, NULL),
(86, 18, 32, NULL, NULL),
(92, 18, 33, NULL, NULL),
(95, 19, 14, NULL, NULL),
(96, 19, 15, NULL, NULL),
(97, 19, 16, NULL, NULL),
(98, 19, 17, NULL, NULL),
(99, 19, 18, NULL, NULL),
(100, 19, 33, NULL, NULL),
(93, 19, 34, NULL, NULL),
(94, 19, 35, NULL, NULL),
(103, 20, 14, NULL, NULL),
(104, 20, 16, NULL, NULL),
(105, 20, 18, NULL, NULL),
(106, 20, 33, NULL, NULL),
(101, 20, 34, NULL, NULL),
(102, 20, 35, NULL, NULL),
(107, 21, 12, NULL, NULL),
(108, 21, 13, NULL, NULL),
(109, 21, 14, NULL, NULL),
(110, 21, 16, NULL, NULL),
(112, 21, 18, NULL, NULL),
(127, 21, 33, NULL, NULL),
(111, 21, 36, NULL, NULL),
(116, 22, 14, NULL, NULL),
(115, 22, 16, NULL, NULL),
(118, 22, 18, NULL, NULL),
(119, 22, 33, NULL, NULL),
(117, 22, 36, NULL, NULL),
(113, 22, 37, NULL, NULL),
(114, 22, 38, NULL, NULL),
(122, 23, 14, NULL, NULL),
(123, 23, 16, NULL, NULL),
(125, 23, 18, NULL, NULL),
(126, 23, 33, NULL, NULL),
(124, 23, 36, NULL, NULL),
(120, 23, 39, NULL, NULL),
(121, 23, 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesias`
--

CREATE TABLE `iglesias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `zona_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `iglesias`
--

INSERT INTO `iglesias` (`id`, `nombre`, `zona_id`, `created_at`, `updated_at`) VALUES
(1, 'Lirio los valles', 1, NULL, NULL),
(3, 'iglesia 1', 1, '2024-06-11 01:23:06', '2024-06-11 01:23:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_12_221022_create_sessions_table', 1),
(7, '2021_07_12_221418_create_productos_table', 1),
(8, '2024_03_03_182414_create_registros_table', 2),
(9, '2024_05_01_160706_create_cargos_table', 3),
(10, '2024_05_01_164527_create_dependencias_table', 4),
(13, '2024_05_01_165211_create_dependencia_cargo_table', 7),
(14, '2024_05_25_020620_create_ministerio_table', 8),
(15, '2024_05_30_025927_create_categoria_ungidos_table', 9),
(17, '2024_06_01_034528_create_zonas_table', 10),
(19, '2024_06_12_052009_create_registro_iglesias_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerio`
--

CREATE TABLE `ministerio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(1500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ministerio`
--

INSERT INTO `ministerio` (`id`, `id_registro`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 114, 'PASTOR', '2024-05-25 07:47:14', '2024-05-25 07:47:14'),
(2, 114, 'EVANGELISTA', '2024-05-25 07:47:14', '2024-05-25 07:47:14'),
(5, 116, 'PASTOR', '2024-05-26 09:44:29', '2024-05-26 09:44:29'),
(6, 116, 'MAESTRO', '2024-05-26 09:44:29', '2024-05-26 09:44:29'),
(7, 117, 'PASTOR', '2024-05-26 10:10:15', '2024-05-26 10:10:15'),
(8, 117, 'EVANGELISTA', '2024-05-26 10:10:15', '2024-05-26 10:10:15'),
(9, 118, 'PASTOR', '2024-05-26 10:28:42', '2024-05-26 10:28:42'),
(10, 118, 'MAESTRO', '2024-05-26 10:28:42', '2024-05-26 10:28:42'),
(11, 118, 'Predicador de circuito', '2024-05-26 10:28:42', '2024-05-26 10:28:42'),
(20, 69, 'PASTOR', '2024-05-26 23:58:00', '2024-05-26 23:58:00'),
(28, 120, 'PASTOR', '2024-05-27 16:26:15', '2024-05-27 16:26:15'),
(29, 120, 'EVANGELISTA', '2024-05-27 16:26:16', '2024-05-27 16:26:16'),
(30, 121, 'PASTOR', '2024-05-30 08:56:41', '2024-05-30 08:56:41'),
(31, 122, 'PASTOR', '2024-05-31 07:24:41', '2024-05-31 07:24:41'),
(32, 123, 'PASTOR', '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(33, 123, 'MAESTRO', '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(35, 125, 'PASTOR', '2024-06-13 07:16:22', '2024-06-13 07:16:22'),
(44, 127, 'PASTOR', '2024-06-14 09:10:59', '2024-06-14 09:10:59'),
(46, 129, 'PASTOR', '2024-06-14 09:35:16', '2024-06-14 09:35:16'),
(53, 128, 'PASTOR', '2024-06-14 10:12:31', '2024-06-14 10:12:31'),
(67, 126, 'PASTOR', '2024-06-16 08:15:59', '2024-06-16 08:15:59'),
(68, 126, 'Docente a Prueba', '2024-06-16 08:16:00', '2024-06-16 08:16:00'),
(76, 130, 'Docente a Prueba', '2024-06-16 09:24:52', '2024-06-16 09:24:52'),
(77, 131, 'PASTOR', '2024-06-16 09:31:07', '2024-06-16 09:31:07'),
(78, 132, 'PASTOR', '2024-06-16 09:36:06', '2024-06-16 09:36:06'),
(79, 133, 'PASTOR', '2024-06-16 09:57:57', '2024-06-16 09:57:57'),
(80, 134, 'Misionera Reconocida', '2024-06-16 09:59:26', '2024-06-16 09:59:26'),
(84, 99, 'PASTOR', '2024-06-16 10:12:38', '2024-06-16 10:12:38'),
(85, 115, 'PASTOR', '2024-06-16 10:26:09', '2024-06-16 10:26:09'),
(86, 115, 'EVANGELISTA', '2024-06-16 10:26:10', '2024-06-16 10:26:10'),
(87, 135, 'PASTOR MISIONERO', '2024-06-16 10:35:06', '2024-06-16 10:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `descripcion` varchar(191) NOT NULL,
  `imagen` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` enum('masculino','femenino') DEFAULT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `pastor` varchar(255) DEFAULT NULL,
  `ministro_ungido` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado_civil` enum('soltero','casado') DEFAULT NULL,
  `fecha_uncion` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `cedula`, `nombres`, `apellidos`, `fecha_nacimiento`, `telefono`, `edad`, `genero`, `profesion`, `pastor`, `ministro_ungido`, `imagen`, `direccion`, `estado_civil`, `fecha_uncion`, `created_at`, `updated_at`) VALUES
(20, '30121121', 'YESICA', 'RODRIGUEZ', '2024-03-21', '2134545', 25, 'femenino', 'DOCENTE', 'ELIAS', 'DIRECTORA', '20240329203941.jpg', 'CR 20 #211', 'casado', '2024', '2024-03-22 17:08:13', '2024-03-30 01:39:41'),
(68, '343433', 'Miguel Angel', 'Rodrigues', '1993-01-25', '12313214', 23, 'masculino', 'doctor', NULL, NULL, 'elias.jpg', NULL, 'casado', '1993', '2024-03-26 17:21:09', '2024-03-26 17:31:04'),
(69, '123123', 'SDFDSG', 'DSFGDSG', '2024-03-28', '3453245', 34, 'masculino', 'DSFGDG', 'JOSE', 'SDFGDSFG', '20240329193428.png', 'direccion', 'soltero', '2024', '2024-03-30 00:34:28', '2024-03-30 00:34:28'),
(70, '23432424', 'sddswewwer', 'sdsdf', '2024-03-26', '3224324', 32, 'masculino', 'ingenio', 'sdf', 'presidente', '20240329201937.jpg', 'sdfsf', 'soltero', '2024', '2024-03-30 00:38:46', '2024-03-30 01:19:37'),
(71, '2134565', 'miqueas neptali', 'armada', '2024-03-22', '3456434', 32, 'masculino', 'ingeniero', 'pablo', 'presidente', '20240329202143.jpg', 'car', 'soltero', '2024', '2024-03-30 01:21:43', '2024-03-30 01:21:43'),
(72, '21345654', 'hgfhf', 'fghfgh', '2024-03-14', '34323423', 31, 'masculino', 'ingeniero', 'elias', 'presidente', '20240329202615.png', 'CR 7 N° 1-30 EL PLACER', 'soltero', '2024', '2024-03-30 01:26:15', '2024-03-30 01:26:15'),
(73, '3435435', 'fsdfsd', 'sdfsdf', '2024-03-14', '234324324', 32, 'masculino', 'ingeniero', 'elias', 'pastor', '20240329202926.png', 'cr 30 #29-05', 'soltero', '2024', '2024-03-30 01:29:26', '2024-03-30 01:29:26'),
(74, '3424234', 'josesdasdas', 'veles', '2024-03-27', '324234', 21, 'masculino', 'trabajador', 'jose', 'presidente', '20240329203322.jpg', 'Av.jose olaya 215', 'soltero', '2024', '2024-03-30 01:33:22', '2024-03-30 01:33:22'),
(75, '2334434', 'juanertet', 'perez', '2024-03-28', '345345', 23, 'masculino', 'ingeniero', 'jose', 'vocal', '20240329203622.jpg', 'Av.jose olaya 215', 'soltero', '2024', '2024-03-30 01:36:22', '2024-03-30 01:36:22'),
(76, '345345', 'juanasdasdasd', 'asdasd', '2024-03-25', '53534535', 32, 'masculino', 'trabajador', 'elias', 'vocal', '20240329203829.jpg', 'Centro cr 30 #29-05', 'soltero', '2024', '2024-03-30 01:38:29', '2024-03-30 01:38:29'),
(77, '34534534', 'miqueas4', 'VELEZ CASTILLO', '2024-04-16', '33333333', 2, 'masculino', 'werwer', 'werewr', 'we', '20240410043659.png', 'werer', 'soltero', '2024', '2024-04-10 09:32:23', '2024-04-10 09:36:59'),
(78, '678678', 'ALVELYIS MARTH', 'armada', '2024-04-23', '34545', 23, 'femenino', '2344', 'werwr', '234', '20240410043841.jpg', 'ssdfsdf', 'soltero', '2024', '2024-04-10 09:38:41', '2024-04-10 09:38:41'),
(81, '999999999', 'r345433', 'rhrh', '2024-04-18', '4564654646', 23, 'masculino', 'rtyy', 'erty', 'rtyrtyty', '20240417115532.jpg', 'erttyreyt', 'soltero', '2024', '2024-04-17 16:55:32', '2024-04-17 16:55:32'),
(82, '66666666', 'thjty', 'tyu', '2024-04-18', '56757', 23, 'masculino', 'rtty', 'rtty', 'rtrt', '20240417115822.jpg', 'ryyr', 'casado', '2024', '2024-04-17 16:58:22', '2024-04-17 16:58:22'),
(83, '8888888888', '356563', 'rtyu', '2024-05-01', '4566767', 23, 'masculino', 'rtyuu', 'rtyu', 'tryu', '20240417120016.jpg', 'ertyty', 'casado', '2024', '2024-04-17 17:00:16', '2024-04-17 17:00:16'),
(84, '2345435', 'dfgdg', 'dfgdfg', '2024-05-23', '4564565', 34, 'masculino', 'werwer', 'werwer', NULL, '20240522104510.jpg', 'werewr', 'soltero', '2024', '2024-05-22 15:45:10', '2024-05-22 15:45:10'),
(85, '23454356787', 'dfgdg', 'dfgdfg', '2024-05-23', '4564565', 34, 'masculino', 'werwer', 'werwer', NULL, NULL, 'werewr', 'soltero', '2024', '2024-05-22 15:57:06', '2024-05-22 15:57:06'),
(86, '23454356787234', 'dfgdg', 'dfgdfg', '2024-05-23', '4564565', 34, 'masculino', 'werwer', 'werwer', NULL, NULL, 'werewr', 'soltero', '2024', '2024-05-22 16:04:41', '2024-05-22 16:04:41'),
(87, '234544345345', 'dfgdg', 'dfgdfg', '2024-05-23', '4564565', 34, 'masculino', 'werwer', 'werwer', NULL, NULL, 'werewr', 'soltero', '2024', '2024-05-22 16:09:44', '2024-05-22 16:09:44'),
(88, '55555555', 'fdgdfg', 'dfgdfg', '2024-05-01', '345435', 23, 'masculino', 'dedgfg', 'ertt', NULL, '20240522111505.png', 'ertert', 'casado', '2024', '2024-05-22 16:15:05', '2024-05-22 16:15:05'),
(89, '123212', 'ertert', 'ert', '2024-05-07', '435435', 23, 'masculino', 'werwerwer', 'wer', NULL, '20240522111850.jpg', 'werwre', 'soltero', '2024', '2024-05-22 16:18:50', '2024-05-22 16:18:50'),
(90, '324324', '3werwer', 'dssdf', '2024-05-07', '234234', 23, 'masculino', 'werewr', 'werwe', NULL, NULL, 'wer', 'casado', '2024', '2024-05-22 16:22:03', '2024-05-22 16:22:03'),
(91, '12321334', 'ertet', 'ertert', '2024-05-28', '345345345', 34, 'masculino', 'wrertert', 'ert', NULL, '20240522113955.jpg', 'asdasd', 'soltero', '2024', '2024-05-22 16:39:55', '2024-05-22 16:39:55'),
(92, '54435345', 'edrgdfg', 'dfgdfg', '2024-05-28', '564656', 23, 'femenino', 'werwer', 'werwer', NULL, '20240522114211.png', 'wewer', 'soltero', '2024', '2024-05-22 16:42:11', '2024-05-22 16:42:11'),
(93, '4564565', 'rtyrty', 'rtyrty', '2024-05-20', '345345', 23, 'masculino', 'wewerwer', '234', NULL, NULL, 'werewr', 'soltero', '2024', '2024-05-22 16:52:04', '2024-05-22 16:52:04'),
(94, '234234', 'wssdfsdf', 'sdfs', '2024-05-02', '234234', 23, 'masculino', 'werwre', 'sdfsdf', NULL, '20240522115541.jpg', 'sdfsdf', 'soltero', '2024', '2024-05-22 16:55:41', '2024-05-22 16:55:41'),
(95, '234234345435', 'wssdfsdf', 'sdfs', '2024-05-02', '234234', 23, 'masculino', 'werwre', 'sdfsdf', NULL, NULL, 'sdfsdf', 'soltero', '2024', '2024-05-22 17:02:35', '2024-05-22 17:02:35'),
(96, '234345', 'wssdfsdf', 'sdfs', '2024-05-02', '234234', 23, 'masculino', 'werwre', 'sdfsdf', NULL, NULL, 'sdfsdf', 'soltero', '2024', '2024-05-22 17:06:27', '2024-05-22 17:06:27'),
(97, '345345345435', 'ertret', 'ertre', '2024-05-10', '345345', 23, 'masculino', 'wwerewr', 'wer', NULL, NULL, 'werewr', 'soltero', '2024', '2024-05-22 17:09:12', '2024-05-22 17:09:12'),
(98, '234234345', 'werewr', 'werw', '2024-05-15', '45646456', 43, 'masculino', 'fghfgh', 'rtyrty', NULL, NULL, 'erret', 'soltero', '2024', '2024-05-22 17:21:43', '2024-05-22 17:21:43'),
(99, '34535', 'erert', 'ertert', '2024-05-03', '3243545', 34, 'masculino', 'ertert', 'ertrt', 'modal2', '20240522122846.jpg', 'ertert', 'casado', '2024', '2024-05-22 17:28:46', '2024-06-16 10:11:48'),
(100, '456456', 'fgfhfhgfh', 'rtyrty', '2024-05-07', '345435', 34, 'masculino', 'eergerg', 'dfgwerwer', NULL, NULL, 'dfdg', 'soltero', '2024', '2024-05-22 17:38:01', '2024-05-22 17:38:01'),
(101, '345354566', 'DGGRTRY', 'DFGDFG', '2024-05-16', '4566', 43, 'masculino', 'RYRYY', 'RTYY', NULL, NULL, 'RTY', 'soltero', NULL, '2024-05-23 11:20:50', '2024-05-23 11:20:50'),
(102, '34535456656767', 'DGGRTRY', 'DFGDFG', '2024-05-16', '4566', 43, 'masculino', 'RYRYY', 'RTYY', NULL, NULL, 'RTY', 'soltero', NULL, '2024-05-23 11:28:09', '2024-05-23 11:28:09'),
(103, '3453455677', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 15:49:21', '2024-05-23 15:49:21'),
(104, '345345567778', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 15:53:27', '2024-05-23 15:53:27'),
(105, '46874323', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 15:57:44', '2024-05-23 15:57:44'),
(106, '46874323656', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 15:59:07', '2024-05-23 15:59:07'),
(107, '46845456', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 16:03:24', '2024-05-23 16:03:24'),
(108, '46845456788', 'dfgdfg', 'dfgdfg', '2024-05-31', '456546', 34, 'masculino', 'dfgdfg', 'dfdfg', NULL, NULL, 'dfgdfg', 'soltero', '2024', '2024-05-23 16:07:27', '2024-05-23 16:07:27'),
(109, '4444444', 'fghfhgfgh', 'sdfsdf', '2024-05-16', '234324', 23, 'masculino', 'werwere', 'werwer', 'modal3', '20240524113952.jpg', 'werewr', 'soltero', '2024', '2024-05-24 16:39:52', '2024-06-16 10:05:27'),
(111, '78787778788', 'dfgdf', 'gdfgdg', '2024-05-09', '234234', 23, 'masculino', 'werewr', 'dfgdfg', NULL, '20240525024002.png', 'sdfsdfsdf', 'casado', '2024', '2024-05-25 07:40:02', '2024-05-25 07:40:02'),
(112, '78787778788456456', 'dfgdf', 'gdfgdg', '2024-05-09', '234234', 23, 'masculino', 'werewr', 'dfgdfg', NULL, NULL, 'sdfsdfsdf', 'casado', NULL, '2024-05-25 07:42:49', '2024-05-25 07:42:49'),
(113, '567657777', 'dfgdf', 'gdfgdg', '2024-05-09', '234234', 23, 'masculino', 'werewr', 'dfgdfg', NULL, NULL, 'sdfsdfsdf', 'casado', NULL, '2024-05-25 07:45:19', '2024-05-25 07:45:19'),
(114, '56757577', 'ttyuyu', 'ttu', '2024-05-10', '567557', 34, 'masculino', 'tyuytu', 'tyutu', NULL, '20240525024713.jpg', 'tytyutu', 'soltero', '2024', '2024-05-25 07:47:13', '2024-05-25 07:47:13'),
(115, '333333', 'sdfsdfsdf', 'sdfsfsdf', '2024-05-08', '234324324', 12, 'femenino', 'wewerewr', 'dfgg', 'modal2', '20240526033443.jpg', 'Centro cr 30 #29-05', 'casado', '2024', '2024-05-26 08:34:43', '2024-06-16 10:26:09'),
(116, '444444455', 'dfgdgdfgdfg', 'dfgdg', '2024-05-11', '43545435', 23, 'masculino', 'sdfdsfsdfsdf', 'Jose', NULL, '20240526044428.jpg', 'Centro cr 30 #29-05', 'soltero', '2000', '2024-05-26 09:44:28', '2024-05-26 09:44:28'),
(117, '234234546', 'sdfsdfsdfsdf', 'sdfsdfsfsd', '2024-05-31', '4345345', 23, 'masculino', 'ertertertt', 'sdfgdsfg', NULL, '20240526051014.jpg', 'Centro cr 30 #29-05', 'soltero', NULL, '2024-05-26 10:10:14', '2024-05-26 10:10:14'),
(118, '34535334544', 'DFGFDG', 'DGDG', '2024-05-08', '345435', 23, 'masculino', 'SFSFSDFSDF', 'SDFSDF', NULL, '20240526052842.jpg', 'SDFSDF', 'soltero', '2000', '2024-05-26 10:28:42', '2024-05-26 10:28:42'),
(119, '4564666', '4564656', 'dgdfgdggdfg', '2024-05-16', '345345345', 34, 'femenino', 'ertertert', 'dgdg', NULL, NULL, 'werwerwr', 'soltero', NULL, '2024-05-26 10:41:25', '2024-05-26 10:41:25'),
(120, '111111', 'SDFDSF', 'SDFSDF', '2024-05-14', '234234', 23, 'masculino', 'SDFDSFSDF', 'ASSAD', NULL, '20240527105738.jpg', 'ASDASD', 'soltero', '2000', '2024-05-27 15:57:38', '2024-05-27 16:20:46'),
(121, '234234345345', 'sdfsdf', 'sdfsdf', '2024-05-01', '2342343243', 23, 'masculino', 'sddsfsdf', 'dfgdfg', 'modal2', NULL, 'sdfsdf', 'soltero', '1990', '2024-05-30 08:56:41', '2024-05-30 08:56:41'),
(122, '212121', 'tyuiityui', 'tyuitiu', '2024-05-24', '4534354354', 21, 'masculino', 'yuiyuiuiu', 'tyutuytu', 'modal2', '20240531022441.jpg', 'Centro cr 30 #29-05', 'soltero', '1990', '2024-05-31 07:24:41', '2024-05-31 07:24:41'),
(123, '7777777777', 'sdfsdfsd', 'sdfsdfsdf', '2024-05-01', '44545455', 21, 'masculino', 'tyuiyuiti', 'pedro', 'modal2', '20240531023842.jpg', 'Centro cr 30 #29-05', 'soltero', '1990', '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(124, '555555', 'sdfgfgdfg', 'dfgdfg', '2024-06-13', '455454554', 25, 'masculino', 'dfgdgdfg', 'sdfsdf', 'modal2', '20240613021217.jpg', 'sdfsdfdsf', 'soltero', NULL, '2024-06-13 07:12:17', '2024-06-16 08:40:30'),
(125, '788787777', 'ddfghd', 'sdfsdfsdf', '2024-06-13', '45545454', 25, 'masculino', 'dfggfdg', 'dfgdfg', 'modal2', '20240613021622.jpg', 'dfgdfgdfg', 'soltero', '1990', '2024-06-13 07:16:22', '2024-06-13 07:16:22'),
(126, '22222222', 'sdfdsf', 'sdfsdf', '2024-06-05', '234234', 23, 'masculino', 'sdfsdf', 'asdasd', 'modal3', '20240614021404.jpg', 'asdasd', 'soltero', '1990', '2024-06-14 07:14:04', '2024-06-16 08:15:59'),
(127, '11111122', 'rdgdfg', 'dfgdfg', '2024-06-26', '234234234', 23, 'masculino', 'sdfsff', 'qweqwe', 'modal2', '20240614041059.jpg', 'qweqwe', 'soltero', '1990', '2024-06-14 09:10:59', '2024-06-14 09:10:59'),
(128, '34444444', 'sdfsdf', 'sdfsdf', '2024-06-12', '23423423', 23, 'masculino', 'asdasdasd', 'aasdasd', 'modal2', '20240614041535.jpg', 'asdasdsad', 'soltero', '1990', '2024-06-14 09:15:35', '2024-06-14 09:49:22'),
(129, '3453454543345', 'dfgdfg', 'dfgdfg', '2024-06-11', '345435443', 23, 'masculino', 'dfgdfg', 'sdfsdf', 'modal2', '20240614043515.jpg', 'sdfsf', 'soltero', '1990', '2024-06-14 09:35:15', '2024-06-14 09:35:15'),
(130, '11111111', 'fghfgh', 'fghfgh', '2024-06-25', '34535', 34, 'masculino', 'sdfsdfsdf', 'dfgdgf', 'modal3', '20240616042452.jpg', 'dfgdfgf', 'soltero', '1990', '2024-06-16 09:24:52', '2024-06-16 09:24:52'),
(131, '1111111555', 'fghfgh', 'fghfgh', '2024-06-25', '34535', 34, 'masculino', 'sdfsdfsdf', 'dfgdgf', 'modal2', NULL, 'dfgdfgf', 'soltero', '1990', '2024-06-16 09:31:07', '2024-06-16 09:31:07'),
(132, '34534534535', 'dfgdfg', 'dfgdgdfg', '2024-06-13', '324234', 23, 'masculino', 'sdfsdfsf', 'ddggdf', 'modal2', '20240616043606.png', 'dfgdfg', 'soltero', '1990', '2024-06-16 09:36:06', '2024-06-16 09:36:06'),
(133, '78787877', 'dfgdfg', 'dfgdgdfg', '2024-06-13', '324234', 23, 'masculino', 'sdfsdfsf', 'ddggdf', 'modal2', '20240616045757.jpg', 'dfgdfg', 'soltero', '1990', '2024-06-16 09:57:57', '2024-06-16 09:57:57'),
(134, '44444444', 'fghfgh', 'fghfgh', '2024-06-19', '23342424', 23, 'masculino', 'sdfsdfsf', 'sdfsf', 'modal3', '20240616045926.jpg', 'sdfsfd', 'soltero', NULL, '2024-06-16 09:59:26', '2024-06-16 09:59:26'),
(135, '456456464556', 'dfgdfgdfg', 'dfgdfg', '2024-06-13', '345435355', 23, 'masculino', 'sdfsdf', 'werwerwer', 'modal2', '20240616053506.jpg', 'werwer', 'soltero', '1990', '2024-06-16 10:35:06', '2024-06-16 10:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_dependencia_cargo`
--

CREATE TABLE `registro_dependencia_cargo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registro_id` bigint(20) UNSIGNED NOT NULL,
  `dependencia_cargos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_dependencia_cargo`
--

INSERT INTO `registro_dependencia_cargo` (`id`, `registro_id`, `dependencia_cargos_id`, `created_at`, `updated_at`) VALUES
(42, 120, 8, '2024-05-27 16:26:15', '2024-05-27 16:26:15'),
(43, 120, 33, '2024-05-27 16:26:15', '2024-05-27 16:26:15'),
(44, 122, 8, '2024-05-31 07:24:41', '2024-05-31 07:24:41'),
(45, 122, 33, '2024-05-31 07:24:41', '2024-05-31 07:24:41'),
(46, 123, 8, '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(47, 123, 33, '2024-05-31 07:38:42', '2024-05-31 07:38:42'),
(49, 125, 15, '2024-06-13 07:16:22', '2024-06-13 07:16:22'),
(61, 129, 8, '2024-06-14 09:35:16', '2024-06-14 09:35:16'),
(74, 128, 8, '2024-06-14 10:12:31', '2024-06-14 10:12:31'),
(75, 128, 33, '2024-06-14 10:12:31', '2024-06-14 10:12:31'),
(94, 126, 8, '2024-06-16 08:15:59', '2024-06-16 08:15:59'),
(95, 126, 33, '2024-06-16 08:15:59', '2024-06-16 08:15:59'),
(102, 124, 8, '2024-06-16 09:21:45', '2024-06-16 09:21:45'),
(103, 130, 8, '2024-06-16 09:24:52', '2024-06-16 09:24:52'),
(104, 132, 8, '2024-06-16 09:36:06', '2024-06-16 09:36:06'),
(105, 133, 8, '2024-06-16 09:57:57', '2024-06-16 09:57:57'),
(106, 134, 8, '2024-06-16 09:59:26', '2024-06-16 09:59:26'),
(107, 135, 9, '2024-06-16 10:35:06', '2024-06-16 10:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_iglesias`
--

CREATE TABLE `registro_iglesias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `id_iglesia` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_iglesias`
--

INSERT INTO `registro_iglesias` (`id`, `id_registro`, `id_iglesia`, `created_at`, `updated_at`) VALUES
(2, 125, 1, '2024-06-13 07:16:23', '2024-06-13 07:16:23'),
(9, 127, 1, '2024-06-14 09:10:59', '2024-06-14 09:10:59'),
(11, 129, 1, '2024-06-14 09:35:16', '2024-06-14 09:35:16'),
(18, 128, 1, '2024-06-14 10:12:31', '2024-06-14 10:12:31'),
(28, 126, 1, '2024-06-16 08:16:00', '2024-06-16 08:16:00'),
(35, 124, 3, '2024-06-16 09:21:45', '2024-06-16 09:21:45'),
(36, 130, 1, '2024-06-16 09:24:52', '2024-06-16 09:24:52'),
(37, 131, 1, '2024-06-16 09:31:07', '2024-06-16 09:31:07'),
(38, 132, 1, '2024-06-16 09:36:06', '2024-06-16 09:36:06'),
(39, 133, 1, '2024-06-16 09:57:58', '2024-06-16 09:57:58'),
(40, 134, 1, '2024-06-16 09:59:26', '2024-06-16 09:59:26'),
(42, 109, 1, '2024-06-16 10:09:47', '2024-06-16 10:09:47'),
(45, 99, 1, '2024-06-16 10:12:38', '2024-06-16 10:12:38'),
(46, 115, 3, '2024-06-16 10:26:10', '2024-06-16 10:26:10'),
(47, 135, 1, '2024-06-16 10:35:06', '2024-06-16 10:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7kkoYBdgKZzkzDXJyX7ffAOrpOenZ7qGJBGSaXNU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemhmSXRYNU5FM0RiUml4bEVDdXVISUtNbHo3c2k5QkFLSmI2RWVHcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lzdGVtYWZpZWxwdnMvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1710901097),
('ziVk4tRqV4kyNQjDasa4Lbm3RAL10L4ZuI5S58mU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW1NWE5uelNvRm1sY2pTZjFIY1YwMzhkend0V0o5Z05rTVdFV2FPaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lzdGVtYWZpZWxwdnMvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1711336986);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fielpvs@gmail.com', NULL, '$2y$10$ItzKq6WD9joSaaBNj3FfyemDZX4qa7qB8LjQ//yM1AsG7QufqTrwu', NULL, NULL, '0wp6ppJA1KDRG3K0xydfz1ysWTqSyuwjLT2Os9EFfS1h9k0w9xS5Hi1Jixap', NULL, NULL, '2024-03-16 18:06:42', '2024-03-16 18:06:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `circuito_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `circuito_id`, `created_at`, `updated_at`) VALUES
(1, 'Zona 1', 3, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_nombre_unique` (`nombre`);

--
-- Indices de la tabla `cargo_actual`
--
ALTER TABLE `cargo_actual`
  ADD KEY `cargo_actual_registro_id_foreign` (`registro_id`),
  ADD KEY `id_dependencia` (`id_dependencia`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro` (`id_registro`);

--
-- Indices de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dependencias_nombre_unique` (`nombre`);

--
-- Indices de la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  ADD PRIMARY KEY (`id_dependencia`,`id_cargo`,`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `dependencia_cargo_id_cargo_foreign` (`id_cargo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iglesias_zona_id_foreign` (`zona_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ministerio`
--
ALTER TABLE `ministerio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ministerio_ibfk_1` (`id_registro`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registro_miembro_cedula_unique` (`cedula`);

--
-- Indices de la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_dependencia_cargo_registro_id_foreign` (`registro_id`),
  ADD KEY `dependencia_cargos_id` (`dependencia_cargos_id`);

--
-- Indices de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_iglesia` (`id_iglesia`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zonas_circuito_id_foreign` (`circuito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ministerio`
--
ALTER TABLE `ministerio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo_actual`
--
ALTER TABLE `cargo_actual`
  ADD CONSTRAINT `cargo_actual_ibfk_1` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `cargo_actual_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `cargo_actual_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  ADD CONSTRAINT `categoria_ungidos_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`);

--
-- Filtros para la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  ADD CONSTRAINT `dependencia_cargo_id_cargo_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `dependencia_cargo_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`);

--
-- Filtros para la tabla `iglesias`
--
ALTER TABLE `iglesias`
  ADD CONSTRAINT `iglesias_zona_id_foreign` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ministerio`
--
ALTER TABLE `ministerio`
  ADD CONSTRAINT `ministerio_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  ADD CONSTRAINT `registro_dependencia_cargo_ibfk_1` FOREIGN KEY (`dependencia_cargos_id`) REFERENCES `dependencia_cargos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_dependencia_cargo_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  ADD CONSTRAINT `registro_iglesias_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`),
  ADD CONSTRAINT `registro_iglesias_ibfk_2` FOREIGN KEY (`id_iglesia`) REFERENCES `iglesias` (`id`);

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_circuito_id_foreign` FOREIGN KEY (`circuito_id`) REFERENCES `circuitos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

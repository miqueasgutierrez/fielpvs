-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2024 a las 13:39:22
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
-- Estructura de tabla para la tabla `ambitos_dependencias`
--

CREATE TABLE `ambitos_dependencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ambitos_dependencias`
--

INSERT INTO `ambitos_dependencias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Nacional', NULL, NULL),
(2, 'Regional', NULL, NULL),
(3, 'Zonal', NULL, NULL),
(4, 'Local', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia_cargos` bigint(20) UNSIGNED NOT NULL,
  `id_candidato` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id`, `id_dependencia_cargos`, `id_candidato`, `created_at`, `updated_at`) VALUES
(30, 128, 136, '2024-06-29 08:15:01', '2024-06-29 08:15:01'),
(31, 135, 137, '2024-07-01 03:36:54', '2024-07-01 03:36:54'),
(32, 136, 138, '2024-07-01 08:18:34', '2024-07-01 08:18:34'),
(33, 135, 136, '2024-07-01 08:35:54', '2024-07-01 08:35:54'),
(34, 128, 137, '2024-07-02 03:10:43', '2024-07-02 03:10:43'),
(35, 128, 138, '2024-07-02 03:10:43', '2024-07-02 03:10:43'),
(36, 136, 137, '2024-07-02 11:34:18', '2024-07-02 11:34:18'),
(37, 132, 136, '2024-07-04 08:26:16', '2024-07-04 08:26:16');

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
(40, 'Vice-supervisor', '2024-05-27 15:35:29', '2024-05-27 15:35:29'),
(41, 'Vocal 1', '2024-07-02 11:12:00', '2024-07-02 11:12:00');

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
(32, 136, 'selected', '2024-06-29 07:43:05', '2024-06-29 07:43:05');

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
(8, 'SONADAM', '2024-05-27 00:32:02', '2024-06-28 09:38:14'),
(10, 'SONAJOV', '2024-05-27 00:33:00', '2024-06-28 08:47:34'),
(12, 'INTERCESIÓN', '2024-05-27 00:36:09', '2024-06-28 09:38:00'),
(14, 'EVANGELISMO Y MISIONES', '2024-05-27 00:37:07', '2024-06-28 09:37:45'),
(16, 'BESF', '2024-05-27 00:41:10', '2024-06-28 09:35:00'),
(18, 'IBFS', '2024-05-27 00:43:42', '2024-05-27 00:43:42'),
(19, 'ESCUELA DOMINICAL', '2024-05-27 15:30:06', '2024-06-28 09:37:24'),
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
  `id_ambito` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencia_cargos`
--

INSERT INTO `dependencia_cargos` (`id`, `id_dependencia`, `id_ambito`, `id_cargo`, `created_at`, `updated_at`) VALUES
(128, 10, 1, 12, NULL, NULL),
(130, 10, 2, 12, NULL, NULL),
(129, 10, 2, 13, NULL, NULL),
(135, 10, 1, 13, NULL, NULL),
(136, 10, 1, 14, NULL, NULL),
(141, 10, 1, 15, NULL, NULL),
(142, 10, 1, 16, NULL, NULL),
(143, 10, 1, 17, NULL, NULL),
(144, 10, 1, 41, NULL, NULL),
(132, 12, 1, 12, NULL, NULL),
(133, 12, 1, 14, NULL, NULL),
(137, 14, 1, 12, NULL, NULL),
(139, 18, 1, 12, NULL, NULL),
(140, 19, 1, 12, NULL, NULL),
(131, 21, 1, 12, NULL, NULL),
(138, 22, 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elecciones`
--

CREATE TABLE `elecciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_votante` bigint(20) UNSIGNED NOT NULL,
  `id_candidato` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elecciones`
--

INSERT INTO `elecciones` (`id`, `id_votante`, `id_candidato`, `created_at`, `updated_at`) VALUES
(29, 136, 37, '2024-07-04 16:10:34', '2024-07-04 16:10:34'),
(30, 136, 30, '2024-07-04 16:13:32', '2024-07-04 16:13:32'),
(31, 136, 31, '2024-07-04 16:13:32', '2024-07-04 16:13:32'),
(32, 136, 32, '2024-07-04 16:13:33', '2024-07-04 16:13:33');

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
(19, '2024_06_12_052009_create_registro_iglesias_table', 11),
(20, '2024_06_16_064108_create_candidatos_table', 12),
(21, '2024_06_21_113246_create_elecciones_table', 13),
(22, '2024_06_27_221601_create_ambitos_dependencias_table', 14);

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
(89, 137, 'Directivo de Damas', '2024-06-17 03:02:08', '2024-06-17 03:02:08'),
(90, 138, 'EVANGELISTA', '2024-06-17 03:03:59', '2024-06-17 03:03:59'),
(91, 139, 'MAESTRO', '2024-06-17 03:06:00', '2024-06-17 03:06:00'),
(92, 136, 'PASTOR', '2024-06-29 07:43:05', '2024-06-29 07:43:05');

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
  `profesion` varchar(250) DEFAULT NULL,
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
(136, '21280756', 'Miqueas Neptali', 'Gutierrez Salazar', '1992-01-25', '21212122', 31, 'masculino', 'Ingeniero en Sistemas', 'Jose Quintana', 'modal2', '20240616215953.jpg', 'Centro cr 30 #29-05', 'soltero', '2000', '2024-06-17 02:59:53', '2024-06-17 02:59:53'),
(137, '31456587', 'Maria Sofia', 'Landaeta Paez', '2024-06-27', '123213213', 31, 'femenino', 'Administradora', 'Jose Mendoza', 'modal3', '20240616220207.jpg', 'Centro cr 30 #29-05', 'casado', '2013', '2024-06-17 03:02:07', '2024-06-17 03:02:07'),
(138, '22345654', 'Jose Felipe', 'Quintana Ruiz', '2024-06-26', '2134545', 34, 'masculino', 'Contador', 'Miguel Gutierrez', 'modal2', '20240616220358.jpg', 'Centro cr 30 #29-05', 'casado', '2012', '2024-06-17 03:03:58', '2024-06-17 03:03:58'),
(139, '32678432', 'Jose Andres', 'Perez Mendosa', '2024-06-21', '212321323', 23, 'masculino', 'Administrador', 'Miguel Sanchez', 'modal2', '20240616220600.jpg', 'Centro cr 30 #29-05', 'casado', '2012', '2024-06-17 03:06:00', '2024-06-17 03:06:00');

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
(112, 136, 130, '2024-06-29 07:43:04', '2024-06-29 07:43:04');

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
(49, 137, 1, '2024-06-17 03:02:08', '2024-06-17 03:02:08'),
(50, 138, 3, '2024-06-17 03:03:59', '2024-06-17 03:03:59'),
(51, 139, 3, '2024-06-17 03:06:00', '2024-06-17 03:06:00'),
(52, 136, 1, '2024-06-29 07:43:05', '2024-06-29 07:43:05');

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
-- Indices de la tabla `ambitos_dependencias`
--
ALTER TABLE `ambitos_dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dependencia_cargos` (`id_dependencia_cargos`),
  ADD KEY `id_candidato` (`id_candidato`);

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
  ADD KEY `categoria_ungidos_ibfk_1` (`id_registro`);

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
  ADD KEY `dependencia_cargo_id_cargo_foreign` (`id_cargo`),
  ADD KEY `id_ambito` (`id_ambito`);

--
-- Indices de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_votante` (`id_votante`),
  ADD KEY `id_candidato` (`id_candidato`);

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
  ADD KEY `registro_dependencia_cargo_ibfk_1` (`dependencia_cargos_id`),
  ADD KEY `registro_dependencia_cargo_registro_id_foreign` (`registro_id`);

--
-- Indices de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_iglesias_ibfk_1` (`id_registro`),
  ADD KEY `registro_iglesias_ibfk_2` (`id_iglesia`);

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
-- AUTO_INCREMENT de la tabla `ambitos_dependencias`
--
ALTER TABLE `ambitos_dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ministerio`
--
ALTER TABLE `ministerio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `candidatos_ibfk_1` FOREIGN KEY (`id_dependencia_cargos`) REFERENCES `dependencia_cargos` (`id`),
  ADD CONSTRAINT `candidatos_ibfk_2` FOREIGN KEY (`id_candidato`) REFERENCES `registros` (`id`);

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
  ADD CONSTRAINT `categoria_ungidos_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  ADD CONSTRAINT `dependencia_cargo_id_cargo_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `dependencia_cargo_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `dependencia_cargos_ibfk_1` FOREIGN KEY (`id_ambito`) REFERENCES `ambitos_dependencias` (`id`);

--
-- Filtros para la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD CONSTRAINT `elecciones_ibfk_1` FOREIGN KEY (`id_votante`) REFERENCES `registros` (`id`),
  ADD CONSTRAINT `elecciones_ibfk_2` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id`);

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
  ADD CONSTRAINT `registro_dependencia_cargo_ibfk_1` FOREIGN KEY (`dependencia_cargos_id`) REFERENCES `dependencia_cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_dependencia_cargo_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  ADD CONSTRAINT `registro_iglesias_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_iglesias_ibfk_2` FOREIGN KEY (`id_iglesia`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_circuito_id_foreign` FOREIGN KEY (`circuito_id`) REFERENCES `circuitos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

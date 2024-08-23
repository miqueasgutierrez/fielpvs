-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2024 a las 05:19:10
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
(146, 195, 149, '2024-08-19 07:21:20', '2024-08-19 07:21:20'),
(147, 195, 150, '2024-08-19 07:21:20', '2024-08-19 07:21:20'),
(148, 195, 152, '2024-08-19 07:21:21', '2024-08-19 07:21:21'),
(149, 196, 152, '2024-08-19 07:36:09', '2024-08-19 07:36:09'),
(150, 196, 153, '2024-08-19 07:36:09', '2024-08-19 07:36:09'),
(151, 196, 151, '2024-08-19 07:36:09', '2024-08-19 07:36:09'),
(152, 197, 140, '2024-08-19 07:36:40', '2024-08-19 07:36:40'),
(153, 197, 148, '2024-08-19 07:36:40', '2024-08-19 07:36:40'),
(154, 197, 153, '2024-08-19 07:36:40', '2024-08-19 07:36:40'),
(155, 198, 137, '2024-08-19 07:37:20', '2024-08-19 07:37:20'),
(156, 198, 140, '2024-08-19 07:37:20', '2024-08-19 07:37:20'),
(159, 199, 148, '2024-08-19 07:37:51', '2024-08-19 07:37:51'),
(160, 200, 136, '2024-08-19 07:38:16', '2024-08-19 07:38:16'),
(161, 200, 153, '2024-08-19 07:38:17', '2024-08-19 07:38:17'),
(162, 201, 136, '2024-08-19 07:38:41', '2024-08-19 07:38:41'),
(163, 201, 138, '2024-08-19 07:38:41', '2024-08-19 07:38:41'),
(164, 201, 152, '2024-08-19 07:38:42', '2024-08-19 07:38:42'),
(165, 202, 136, '2024-08-19 07:39:14', '2024-08-19 07:39:14'),
(166, 202, 138, '2024-08-19 07:39:14', '2024-08-19 07:39:14'),
(167, 202, 148, '2024-08-19 07:39:14', '2024-08-19 07:39:14'),
(168, 203, 140, '2024-08-19 07:39:38', '2024-08-19 07:39:38'),
(169, 203, 151, '2024-08-19 07:39:38', '2024-08-19 07:39:38'),
(170, 203, 136, '2024-08-19 07:39:38', '2024-08-19 07:39:38'),
(171, 205, 152, '2024-08-19 22:19:28', '2024-08-19 22:19:28'),
(172, 205, 150, '2024-08-19 22:19:28', '2024-08-19 22:19:28'),
(173, 205, 136, '2024-08-19 22:19:28', '2024-08-19 22:19:28'),
(174, 206, 152, '2024-08-19 22:19:45', '2024-08-19 22:19:45'),
(175, 206, 150, '2024-08-19 22:19:45', '2024-08-19 22:19:45'),
(176, 206, 136, '2024-08-19 22:19:45', '2024-08-19 22:19:45'),
(183, 193, 136, '2024-08-19 22:21:23', '2024-08-19 22:21:23'),
(184, 193, 138, '2024-08-19 22:21:23', '2024-08-19 22:21:23'),
(185, 193, 140, '2024-08-19 22:21:23', '2024-08-19 22:21:23'),
(186, 193, 148, '2024-08-19 22:21:23', '2024-08-19 22:21:23'),
(193, 214, 151, '2024-08-19 22:27:16', '2024-08-19 22:27:16'),
(194, 214, 140, '2024-08-19 22:27:16', '2024-08-19 22:27:16'),
(195, 214, 148, '2024-08-19 22:27:16', '2024-08-19 22:27:16'),
(196, 212, 149, '2024-08-19 22:28:11', '2024-08-19 22:28:11'),
(197, 212, 136, '2024-08-19 22:28:11', '2024-08-19 22:28:11'),
(198, 212, 153, '2024-08-19 22:28:11', '2024-08-19 22:28:11'),
(199, 207, 149, '2024-08-19 22:45:08', '2024-08-19 22:45:08'),
(200, 207, 152, '2024-08-19 22:45:08', '2024-08-19 22:45:08'),
(201, 207, 153, '2024-08-19 22:45:08', '2024-08-19 22:45:08'),
(202, 208, 152, '2024-08-19 22:45:36', '2024-08-19 22:45:36'),
(203, 208, 153, '2024-08-19 22:45:36', '2024-08-19 22:45:36'),
(204, 208, 150, '2024-08-19 22:45:36', '2024-08-19 22:45:36'),
(205, 215, 151, '2024-08-19 22:46:00', '2024-08-19 22:46:00'),
(206, 215, 140, '2024-08-19 22:46:00', '2024-08-19 22:46:00'),
(207, 215, 148, '2024-08-19 22:46:00', '2024-08-19 22:46:00'),
(208, 216, 136, '2024-08-19 22:46:20', '2024-08-19 22:46:20'),
(209, 216, 140, '2024-08-19 22:46:20', '2024-08-19 22:46:20'),
(210, 216, 137, '2024-08-19 22:46:20', '2024-08-19 22:46:20'),
(211, 217, 148, '2024-08-19 22:46:51', '2024-08-19 22:46:51'),
(212, 217, 151, '2024-08-19 22:46:51', '2024-08-19 22:46:51'),
(213, 217, 153, '2024-08-19 22:46:51', '2024-08-19 22:46:51'),
(214, 218, 137, '2024-08-19 22:47:15', '2024-08-19 22:47:15'),
(215, 218, 138, '2024-08-19 22:47:15', '2024-08-19 22:47:15'),
(216, 218, 153, '2024-08-19 22:47:15', '2024-08-19 22:47:15'),
(217, 218, 140, '2024-08-19 22:47:15', '2024-08-19 22:47:15'),
(218, 219, 149, '2024-08-20 00:22:37', '2024-08-20 00:22:37'),
(219, 219, 150, '2024-08-20 00:22:37', '2024-08-20 00:22:37'),
(220, 219, 152, '2024-08-20 00:22:37', '2024-08-20 00:22:37'),
(221, 221, 151, '2024-08-20 00:23:22', '2024-08-20 00:23:22'),
(222, 221, 140, '2024-08-20 00:23:22', '2024-08-20 00:23:22'),
(223, 221, 148, '2024-08-20 00:23:22', '2024-08-20 00:23:22'),
(224, 223, 140, '2024-08-20 00:23:48', '2024-08-20 00:23:48'),
(225, 223, 148, '2024-08-20 00:23:48', '2024-08-20 00:23:48'),
(226, 223, 137, '2024-08-20 00:23:48', '2024-08-20 00:23:48'),
(227, 222, 153, '2024-08-20 00:24:14', '2024-08-20 00:24:14'),
(228, 222, 136, '2024-08-20 00:24:14', '2024-08-20 00:24:14'),
(229, 222, 138, '2024-08-20 00:24:14', '2024-08-20 00:24:14'),
(230, 222, 140, '2024-08-20 00:24:14', '2024-08-20 00:24:14'),
(231, 220, 149, '2024-08-20 00:38:38', '2024-08-20 00:38:38'),
(232, 220, 150, '2024-08-20 00:38:38', '2024-08-20 00:38:38'),
(233, 220, 152, '2024-08-20 00:38:38', '2024-08-20 00:38:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `orden`, `created_at`, `updated_at`) VALUES
(12, 'Presidente', 1, '2024-05-27 00:44:36', '2024-05-27 00:44:36'),
(13, 'Vicepresidente', 7, '2024-05-27 00:44:51', '2024-05-27 00:44:51'),
(14, 'Secretario (a)', 13, '2024-05-27 00:45:01', '2024-05-27 00:45:01'),
(15, 'Secretario (a) adjunto (a)', 16, '2024-05-27 00:45:22', '2024-05-27 00:45:22'),
(16, 'Tesorero (a)', 18, '2024-05-27 00:45:33', '2024-05-27 00:45:33'),
(17, 'Tesorero (a) adjunto (a)', 20, '2024-05-27 00:45:47', '2024-05-27 00:45:47'),
(18, 'Vocal', 0, '2024-05-27 00:46:10', '2024-05-27 08:26:41'),
(19, 'Primer Comandante', 2, '2024-05-27 00:50:23', '2024-05-27 01:04:10'),
(20, 'Segundo comandante', 8, '2024-05-27 00:51:00', '2024-05-27 01:04:38'),
(21, 'Comandante adulto', 14, '2024-05-27 00:51:54', '2024-05-27 01:06:06'),
(22, 'Comandante juvenil', 17, '2024-05-27 00:53:51', '2024-05-27 01:07:22'),
(23, 'Comandante juniors', 19, '2024-05-27 00:55:08', '2024-08-14 10:10:04'),
(24, 'Tesorería', 21, '2024-05-27 00:56:40', '2024-05-27 01:07:52'),
(25, 'Intendencia', 22, '2024-05-27 00:59:02', '2024-05-27 01:08:16'),
(26, 'Secretaria', 23, '2024-05-27 01:01:47', '2024-05-27 01:09:01'),
(27, 'Jefe de operaciones', 26, '2024-05-27 01:09:42', '2024-05-27 01:09:42'),
(28, 'Jefe de adiestramiento', 27, '2024-05-27 01:09:54', '2024-05-27 01:09:54'),
(29, 'Jefe de instrucción', 28, '2024-05-27 01:10:58', '2024-05-27 01:10:58'),
(30, 'Director Nacional', 3, '2024-05-27 01:11:35', '2024-05-27 01:11:35'),
(31, 'Subdirector Académico', 9, '2024-05-27 01:11:49', '2024-05-27 01:11:49'),
(32, 'Subdirector Administrativo', 15, '2024-05-27 01:12:03', '2024-05-27 01:12:03'),
(33, 'Miembro', 100, '2024-05-27 01:38:17', '2024-05-27 08:11:12'),
(34, 'Superintendente', 4, '2024-05-27 15:30:46', '2024-05-27 15:30:46'),
(35, 'Vice-intendente', 10, '2024-05-27 15:31:18', '2024-05-27 15:31:18'),
(36, 'Tesorero de ASOMIN', 22, '2024-05-27 15:33:46', '2024-05-27 15:33:46'),
(37, 'Presbítero', 5, '2024-05-27 15:34:14', '2024-05-27 15:34:14'),
(38, 'Vice-presbítero', 11, '2024-05-27 15:34:34', '2024-05-27 15:34:34'),
(39, 'Supervisor de Zona', 6, '2024-05-27 15:35:11', '2024-05-27 15:35:11'),
(40, 'Vice-supervisor', 12, '2024-05-27 15:35:29', '2024-05-27 15:35:29'),
(41, 'Vocales', 24, '2024-07-02 11:12:00', '2024-07-02 11:12:00'),
(42, 'ninguno', 0, '2024-07-23 07:51:19', '2024-07-23 07:51:19'),
(43, 'Comandante General', 2, '2024-08-22 16:43:23', '2024-08-22 16:43:23'),
(44, 'Intendente', NULL, '2024-08-23 08:05:06', '2024-08-23 08:05:06'),
(45, 'Sub-Intendente', NULL, '2024-08-23 08:06:14', '2024-08-23 08:06:14'),
(46, 'Coordinador', NULL, '2024-08-23 08:08:40', '2024-08-23 08:08:40'),
(47, 'Sub-coordinador', NULL, '2024-08-23 08:09:18', '2024-08-23 08:11:30');

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
(111, 136, 'selected', '2024-08-14 08:04:51', '2024-08-14 08:04:51'),
(112, 139, 'ninguna', '2024-08-17 10:10:53', '2024-08-17 10:10:53'),
(114, 137, 'ninguna', '2024-08-17 11:29:30', '2024-08-17 11:29:30'),
(117, 148, 'selected', '2024-08-19 06:48:08', '2024-08-19 06:48:08'),
(120, 151, 'ninguna', '2024-08-19 06:57:38', '2024-08-19 06:57:38'),
(123, 149, 'selected', '2024-08-20 01:08:43', '2024-08-20 01:08:43'),
(124, 150, 'selected', '2024-08-20 01:09:07', '2024-08-20 01:09:07'),
(125, 153, 'selected', '2024-08-20 01:10:10', '2024-08-20 01:10:10'),
(126, 138, 'ninguna', '2024-08-20 01:11:14', '2024-08-20 01:11:14'),
(127, 140, 'selected', '2024-08-20 01:11:43', '2024-08-20 01:11:43'),
(128, 152, 'selected', '2024-08-21 17:34:24', '2024-08-21 17:34:24');

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
  `descripcion_local` varchar(200) DEFAULT NULL,
  `descripcion_regional` varchar(200) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre`, `descripcion_local`, `descripcion_regional`, `orden`, `created_at`, `updated_at`) VALUES
(8, 'SONADAM', 'SOCIEDAD DE DAMAS', 'DAMAS', 3, '2024-05-27 00:32:02', '2024-06-28 09:38:14'),
(12, 'INTERCESIÓN', 'INTECERSION', 'INTERCESIÓN', 5, '2024-05-27 00:36:09', '2024-06-28 09:38:00'),
(14, 'EVANGELISMO Y MISIONES', 'EVANGELISMO Y MISIONES', 'EVANGELISMO', 4, '2024-05-27 00:37:07', '2024-06-28 09:37:45'),
(16, 'BESF', 'BESF', 'BESF', 6, '2024-05-27 00:41:10', '2024-06-28 09:35:00'),
(18, 'IBFS', NULL, NULL, 7, '2024-05-27 00:43:42', '2024-05-27 00:43:42'),
(19, 'ESCUELA DOMINICAL', 'ESCUELA DOMINICAL', 'ESCUELA DOMINICAL', 6, '2024-05-27 15:30:06', '2024-06-28 09:37:24'),
(21, 'DIRECTIVA NACIONAL DE LA FIELPVS', NULL, NULL, 1, '2024-05-27 15:46:07', '2024-05-27 15:46:07'),
(23, 'DIRECTIVA DE ZONA NACIONAL', NULL, NULL, 9, '2024-05-27 15:52:15', '2024-05-27 15:52:15'),
(25, 'SONAJOV', 'SOCIEDAD DE JOVENES', 'JÓVENES REGIONALES', 2, NULL, NULL),
(26, 'NINGUNA', NULL, NULL, 15, '2024-07-23 07:49:57', '2024-07-23 07:49:57'),
(27, 'PRESBÍTERO REGIONAL', NULL, 'PRESBÍTERO REGIONAL', 16, '2024-07-30 10:15:26', '2024-07-30 10:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia_cargos`
--

CREATE TABLE `dependencia_cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_ambito` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencia_cargos`
--

INSERT INTO `dependencia_cargos` (`id`, `id_dependencia`, `id_ambito`, `id_cargo`, `cantidad`, `created_at`, `updated_at`) VALUES
(224, 8, 1, 12, NULL, NULL, NULL),
(231, 8, 2, 12, NULL, NULL, NULL),
(321, 8, 4, 12, NULL, NULL, NULL),
(225, 8, 1, 13, NULL, NULL, NULL),
(232, 8, 2, 13, NULL, NULL, NULL),
(322, 8, 4, 13, NULL, NULL, NULL),
(226, 8, 1, 14, NULL, NULL, NULL),
(233, 8, 2, 14, NULL, NULL, NULL),
(324, 8, 4, 14, NULL, NULL, NULL),
(227, 8, 1, 15, NULL, NULL, NULL),
(228, 8, 1, 16, NULL, NULL, NULL),
(234, 8, 2, 16, NULL, NULL, NULL),
(323, 8, 4, 16, NULL, NULL, NULL),
(229, 8, 1, 17, NULL, NULL, NULL),
(235, 8, 1, 41, 3, NULL, NULL),
(236, 8, 2, 41, 3, NULL, NULL),
(325, 8, 4, 41, NULL, NULL, NULL),
(247, 12, 1, 12, NULL, NULL, NULL),
(254, 12, 2, 12, NULL, NULL, NULL),
(248, 12, 1, 13, NULL, NULL, NULL),
(255, 12, 2, 13, NULL, NULL, NULL),
(249, 12, 1, 14, NULL, NULL, NULL),
(256, 12, 2, 14, NULL, NULL, NULL),
(318, 12, 4, 14, NULL, NULL, NULL),
(250, 12, 1, 15, NULL, NULL, NULL),
(251, 12, 1, 16, NULL, NULL, NULL),
(257, 12, 2, 16, NULL, NULL, NULL),
(319, 12, 4, 16, NULL, NULL, NULL),
(252, 12, 1, 17, NULL, NULL, NULL),
(253, 12, 1, 41, 3, NULL, NULL),
(258, 12, 2, 41, 3, NULL, NULL),
(320, 12, 4, 41, NULL, NULL, NULL),
(316, 12, 4, 46, NULL, NULL, NULL),
(317, 12, 4, 47, NULL, NULL, NULL),
(259, 14, 1, 12, NULL, NULL, NULL),
(266, 14, 2, 12, NULL, NULL, NULL),
(311, 14, 4, 12, NULL, NULL, NULL),
(260, 14, 1, 13, NULL, NULL, NULL),
(267, 14, 2, 13, NULL, NULL, NULL),
(312, 14, 4, 13, NULL, NULL, NULL),
(261, 14, 1, 14, NULL, NULL, NULL),
(268, 14, 2, 14, NULL, NULL, NULL),
(314, 14, 4, 14, NULL, NULL, NULL),
(262, 14, 1, 15, NULL, NULL, NULL),
(263, 14, 1, 16, NULL, NULL, NULL),
(269, 14, 2, 16, NULL, NULL, NULL),
(313, 14, 4, 16, NULL, NULL, NULL),
(264, 14, 1, 17, NULL, NULL, NULL),
(265, 14, 1, 41, 3, NULL, NULL),
(270, 14, 2, 41, 3, NULL, NULL),
(315, 14, 4, 41, NULL, NULL, NULL),
(285, 16, 1, 14, NULL, NULL, NULL),
(275, 16, 2, 19, NULL, NULL, NULL),
(195, 16, 2, 20, NULL, NULL, NULL),
(273, 16, 1, 20, NULL, NULL, NULL),
(196, 16, 2, 21, NULL, NULL, NULL),
(276, 16, 1, 21, NULL, NULL, NULL),
(197, 16, 2, 22, NULL, NULL, NULL),
(274, 16, 1, 22, NULL, NULL, NULL),
(198, 16, 2, 23, NULL, NULL, NULL),
(277, 16, 1, 23, NULL, NULL, NULL),
(199, 16, 2, 24, NULL, NULL, NULL),
(278, 16, 1, 24, NULL, NULL, NULL),
(200, 16, 2, 25, NULL, NULL, NULL),
(279, 16, 1, 25, NULL, NULL, NULL),
(280, 16, 1, 26, NULL, NULL, NULL),
(281, 16, 2, 26, NULL, NULL, NULL),
(201, 16, 2, 27, NULL, NULL, NULL),
(282, 16, 1, 27, NULL, NULL, NULL),
(202, 16, 2, 28, NULL, NULL, NULL),
(283, 16, 1, 28, NULL, NULL, NULL),
(203, 16, 2, 29, NULL, NULL, NULL),
(284, 16, 1, 29, NULL, NULL, NULL),
(272, 16, 1, 43, NULL, NULL, NULL),
(286, 18, 1, 14, NULL, NULL, NULL),
(287, 18, 1, 15, NULL, NULL, NULL),
(288, 18, 1, 16, NULL, NULL, NULL),
(289, 18, 1, 17, NULL, NULL, NULL),
(145, 18, 1, 30, NULL, NULL, NULL),
(146, 18, 1, 31, NULL, NULL, NULL),
(147, 18, 1, 32, NULL, NULL, NULL),
(290, 18, 1, 41, 3, NULL, NULL),
(294, 19, 1, 14, NULL, NULL, NULL),
(301, 19, 2, 14, NULL, NULL, NULL),
(295, 19, 1, 15, NULL, NULL, NULL),
(296, 19, 1, 16, NULL, NULL, NULL),
(302, 19, 2, 16, NULL, NULL, NULL),
(297, 19, 1, 17, NULL, NULL, NULL),
(292, 19, 1, 34, NULL, NULL, NULL),
(299, 19, 2, 34, NULL, NULL, NULL),
(293, 19, 1, 35, NULL, NULL, NULL),
(300, 19, 2, 35, NULL, NULL, NULL),
(298, 19, 1, 41, 3, NULL, NULL),
(303, 19, 2, 41, 3, NULL, NULL),
(205, 21, 1, 12, NULL, NULL, NULL),
(206, 21, 1, 13, NULL, NULL, NULL),
(212, 21, 1, 15, NULL, NULL, NULL),
(304, 21, 1, 16, NULL, NULL, NULL),
(214, 21, 1, 17, NULL, NULL, NULL),
(305, 21, 1, 36, NULL, NULL, NULL),
(193, 21, 1, 41, 3, NULL, NULL),
(215, 23, 3, 14, NULL, NULL, NULL),
(216, 23, 3, 16, NULL, NULL, NULL),
(217, 23, 3, 36, NULL, NULL, NULL),
(207, 23, 3, 39, NULL, NULL, NULL),
(208, 23, 3, 40, NULL, NULL, NULL),
(218, 23, 3, 41, 3, NULL, NULL),
(219, 25, 4, 12, NULL, NULL, NULL),
(237, 25, 1, 12, NULL, NULL, NULL),
(242, 25, 2, 12, NULL, NULL, NULL),
(220, 25, 4, 13, NULL, NULL, NULL),
(238, 25, 1, 13, NULL, NULL, NULL),
(243, 25, 2, 13, NULL, NULL, NULL),
(223, 25, 4, 14, NULL, NULL, NULL),
(239, 25, 1, 14, NULL, NULL, NULL),
(244, 25, 2, 14, NULL, NULL, NULL),
(240, 25, 1, 15, NULL, NULL, NULL),
(221, 25, 4, 16, NULL, NULL, NULL),
(241, 25, 1, 16, NULL, NULL, NULL),
(245, 25, 2, 16, NULL, NULL, NULL),
(192, 25, 1, 41, 3, NULL, NULL),
(222, 25, 4, 41, 3, NULL, NULL),
(246, 25, 2, 41, 3, NULL, NULL),
(152, 26, 1, 42, NULL, NULL, NULL),
(307, 27, 2, 14, NULL, NULL, NULL),
(310, 27, 2, 16, NULL, NULL, NULL),
(308, 27, 2, 36, NULL, NULL, NULL),
(191, 27, 1, 37, NULL, NULL, NULL),
(306, 27, 2, 38, NULL, NULL, NULL),
(309, 27, 2, 41, 3, NULL, NULL);

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
(500, 136, 172, '2024-08-21 17:19:21', '2024-08-21 17:19:21'),
(501, 136, 176, '2024-08-21 17:19:21', '2024-08-21 17:19:21'),
(503, 136, 146, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(504, 136, 151, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(505, 136, 154, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(506, 136, 156, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(507, 136, 159, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(508, 136, 161, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(509, 136, 163, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(510, 136, 166, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(511, 136, 169, '2024-08-21 17:21:41', '2024-08-21 17:21:41'),
(512, 136, 201, '2024-08-21 17:24:21', '2024-08-21 17:24:21'),
(513, 136, 204, '2024-08-21 17:24:21', '2024-08-21 17:24:21'),
(514, 136, 207, '2024-08-21 17:24:21', '2024-08-21 17:24:21'),
(515, 136, 209, '2024-08-21 17:24:21', '2024-08-21 17:24:21'),
(516, 136, 212, '2024-08-21 17:24:22', '2024-08-21 17:24:22'),
(517, 136, 216, '2024-08-21 17:24:22', '2024-08-21 17:24:22'),
(518, 136, 214, '2024-08-21 17:24:22', '2024-08-21 17:24:22'),
(519, 136, 217, '2024-08-21 17:24:22', '2024-08-21 17:24:22'),
(520, 136, 219, '2024-08-21 17:26:33', '2024-08-21 17:26:33'),
(521, 136, 233, '2024-08-21 17:26:33', '2024-08-21 17:26:33'),
(522, 136, 226, '2024-08-21 17:26:33', '2024-08-21 17:26:33'),
(523, 136, 221, '2024-08-21 17:26:33', '2024-08-21 17:26:33'),
(524, 136, 230, '2024-08-21 17:26:33', '2024-08-21 17:26:33'),
(525, 136, 227, '2024-08-21 17:26:34', '2024-08-21 17:26:34'),
(526, 136, 229, '2024-08-21 17:26:34', '2024-08-21 17:26:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_dependencias`
--

CREATE TABLE `estado_dependencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_ambito` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_dependencias`
--

INSERT INTO `estado_dependencias` (`id`, `id_dependencia`, `id_ambito`, `estado`, `created_at`, `updated_at`) VALUES
(2, 18, 1, '1', '2024-07-20 16:19:21', '2024-07-22 08:28:24'),
(3, 21, 1, '1', '2024-07-20 21:05:41', '2024-07-25 17:26:59'),
(4, 8, 1, '1', '2024-07-25 09:50:06', '2024-07-25 09:50:06'),
(5, 25, 1, '1', '2024-07-25 09:51:36', '2024-07-25 09:51:36'),
(6, 14, 1, '1', '2024-07-25 09:52:13', '2024-07-25 09:52:13'),
(7, 12, 1, '1', '2024-07-25 09:52:44', '2024-07-25 09:52:44'),
(8, 19, 1, '1', '2024-07-25 09:53:05', '2024-07-25 09:53:05'),
(9, 16, 1, '1', '2024-07-25 09:53:39', '2024-07-25 09:53:39'),
(10, 23, 3, '1', '2024-07-02 12:40:55', '2024-07-03 12:41:02'),
(11, 25, 4, '1', '2024-07-27 16:51:47', '2024-07-27 17:28:30'),
(12, 25, 2, '1', '2024-07-29 01:50:59', '2024-07-29 01:50:59'),
(13, 8, 2, '1', '2024-07-29 01:51:14', '2024-07-29 01:51:14'),
(14, 14, 2, '1', '2024-07-29 01:51:28', '2024-07-29 01:51:28'),
(17, 19, 2, '1', '2024-07-29 01:52:11', '2024-07-29 01:52:11'),
(18, 8, 4, '1', '2024-07-29 02:05:50', '2024-07-29 02:05:50'),
(19, 14, 4, '1', '2024-07-29 02:06:04', '2024-07-29 02:06:04'),
(20, 19, 4, '1', '2024-07-29 02:06:19', '2024-07-29 02:06:19'),
(21, 12, 2, '1', '2024-07-29 02:06:46', '2024-07-29 02:06:46'),
(22, 12, 4, '1', '2024-07-29 07:34:01', '2024-07-29 07:34:01'),
(23, 27, 2, '1', '2024-07-31 08:32:40', '2024-07-31 08:32:40'),
(24, 16, 2, '1', '2024-08-14 08:01:41', '2024-08-14 08:01:41');

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
(3, 'Senderos del Rey', 1, '2024-06-11 01:23:06', '2024-06-11 01:23:06');

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
(22, '2024_06_27_221601_create_ambitos_dependencias_table', 14),
(23, '2024_07_11_043752_create_permission_tables', 15),
(24, '2024_07_20_033038_create_estado_dependencias_table', 16);

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
(175, 136, 'Docente Titular', '2024-08-14 08:04:51', '2024-08-14 08:04:51'),
(176, 139, 'MAESTRO', '2024-08-17 10:10:53', '2024-08-17 10:10:53'),
(178, 137, 'Directivo de Damas', '2024-08-17 11:29:29', '2024-08-17 11:29:29'),
(181, 148, 'PASTOR', '2024-08-19 06:48:07', '2024-08-19 06:48:07'),
(184, 151, 'Misionera Reconocida', '2024-08-19 06:57:38', '2024-08-19 06:57:38'),
(187, 149, 'EVANGELISTA', '2024-08-20 01:08:43', '2024-08-20 01:08:43'),
(188, 150, 'PASTOR MISIONERO', '2024-08-20 01:09:07', '2024-08-20 01:09:07'),
(189, 153, 'PASTOR', '2024-08-20 01:10:10', '2024-08-20 01:10:10'),
(190, 138, 'EVANGELISTA', '2024-08-20 01:11:13', '2024-08-20 01:11:13'),
(191, 140, 'PASTOR', '2024-08-20 01:11:43', '2024-08-20 01:11:43'),
(192, 152, 'Obrero Pastor', '2024-08-21 17:34:24', '2024-08-21 17:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 41),
(5, 'App\\Models\\User', 42),
(5, 'App\\Models\\User', 43),
(5, 'App\\Models\\User', 44),
(5, 'App\\Models\\User', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 41),
(4, 'App\\Models\\User', 42),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 48),
(4, 'App\\Models\\User', 49),
(4, 'App\\Models\\User', 50),
(4, 'App\\Models\\User', 51),
(4, 'App\\Models\\User', 52),
(4, 'App\\Models\\User', 53),
(5, 'App\\Models\\User', 46);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin-access', 'web', '2024-07-10 12:43:27', '2024-07-02 12:43:36'),
(2, 'view-operator', '', '2024-07-03 12:43:41', '2024-07-02 12:43:47'),
(5, 'view-members', 'web', '2024-07-16 16:18:53', '2024-07-16 16:18:53');

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
(136, '21280756', 'Miqueas Neptali', 'Gutierrez Salazar', '1992-01-25', '21212122', 31, 'masculino', 'Ingeniero en Sistemas', 'Jose Quintana', 'modal3', '20240616215953.jpg', 'Centro cr 30 #29-05', 'soltero', '2000', '2024-06-17 02:59:53', '2024-08-04 11:48:26'),
(137, '31456587', 'Maria Sofia', 'Landaeta Paez', '2024-06-27', '123213213', 31, 'femenino', 'Administradora', 'Jose Mendoza', 'modal3', '20240616220207.jpg', 'Centro cr 30 #29-05', 'casado', '2013', '2024-06-17 03:02:07', '2024-06-17 03:02:07'),
(138, '22345654', 'Jose Felipe', 'Quintana Ruiz', '2024-06-26', '2134545', 34, 'masculino', 'Contador', 'Miguel Gutierrez', 'modal2', '20240616220358.jpg', 'Centro cr 30 #29-05', 'casado', '2012', '2024-06-17 03:03:58', '2024-06-17 03:03:58'),
(139, '32678432', 'Jose Andres', 'Perez Mendosa', '2024-06-21', '212321323', 23, 'masculino', 'Administrador', 'Miguel Sanchez', 'modal2', '20240616220600.jpg', 'Centro cr 30 #29-05', 'casado', '2012', '2024-06-17 03:06:00', '2024-06-17 03:06:00'),
(140, '23123654', 'Mirian', 'Rios Garcia', '2024-07-02', '324234234', 31, 'masculino', 'Ingeniera civil', 'Pedro almario', 'modal2', '20240716112612.jpg', 'Centro cr 30 #29-05', 'soltero', '1902', '2024-07-16 16:26:12', '2024-07-16 16:26:12'),
(148, '23234234', 'Diana Maria', 'Perez Mendoza', '2024-08-16', '234234', 23, 'femenino', 'werwerwe', 'albaro', 'modal2', '20240819014807.jpg', 'werwerewwee', 'casado', '1992', '2024-08-17 10:38:16', '2024-08-19 06:48:07'),
(149, '12456234', 'Miguel Venite', 'Rios Alvares', '1992-06-02', '3212332', 31, 'masculino', 'Ingeniero', 'Jose Elias', 'modal2', '20240819015048.jpg', 'Centro', 'casado', '1992', '2024-08-19 06:50:48', '2024-08-19 06:50:48'),
(150, '13455346', 'Javier Reina', 'Gutierrez Mendoza', '1990-02-13', '31234123', 42, 'masculino', 'Ingeniero', 'Pedro', 'modal2', '20240819015321.jpg', 'centrp', 'casado', '1990', '2024-08-19 06:53:21', '2024-08-19 06:53:21'),
(151, '14564345', 'Tatiana Valentina', 'Melendez  Gomez', '1993-03-14', '213434343', 32, 'femenino', 'secretaria', 'Juan', 'modal3', '20240819015738.jpg', 'Centro', 'casado', '1992', '2024-08-19 06:57:38', '2024-08-19 06:57:38'),
(152, '14234433', 'Josue David', 'Rondon Gomez', '1992-03-02', '21231232', 34, 'masculino', 'Ingeniero', 'Elias Aquino', 'modal3', '20240819020109.jpg', 'Centro', 'casado', '1992', '2024-08-19 07:01:09', '2024-08-19 07:01:09'),
(153, '14234543', 'Santiago Elias', 'Aquino Mendoza', '1993-03-01', '32432345', 32, 'masculino', 'Ingeniero', 'Elias aquino', 'modal2', '20240819020336.jpg', 'Centro', 'casado', '1993', '2024-08-19 07:03:36', '2024-08-19 07:03:36');

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
(238, 136, 152, '2024-08-14 08:04:50', '2024-08-14 08:04:50'),
(239, 136, 191, '2024-08-14 08:04:50', '2024-08-14 08:04:50'),
(240, 139, 191, '2024-08-17 10:10:53', '2024-08-17 10:10:53'),
(242, 137, 191, '2024-08-17 11:29:29', '2024-08-17 11:29:29'),
(245, 148, 191, '2024-08-19 06:48:07', '2024-08-19 06:48:07'),
(253, 150, 193, '2024-08-20 01:09:07', '2024-08-20 01:09:07'),
(254, 153, 193, '2024-08-20 01:10:10', '2024-08-20 01:10:10'),
(255, 138, 152, '2024-08-20 01:11:13', '2024-08-20 01:11:13'),
(256, 140, 191, '2024-08-20 01:11:43', '2024-08-20 01:11:43'),
(257, 152, 207, '2024-08-21 17:34:24', '2024-08-21 17:34:24'),
(258, 152, 191, '2024-08-21 17:34:24', '2024-08-21 17:34:24');

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
(138, 136, 1, '2024-08-14 08:04:51', '2024-08-14 08:04:51'),
(139, 139, 3, '2024-08-17 10:10:53', '2024-08-17 10:10:53'),
(141, 137, 1, '2024-08-17 11:29:30', '2024-08-17 11:29:30'),
(144, 148, 1, '2024-08-19 06:48:08', '2024-08-19 06:48:08'),
(147, 151, 1, '2024-08-19 06:57:38', '2024-08-19 06:57:38'),
(150, 149, 1, '2024-08-20 01:08:43', '2024-08-20 01:08:43'),
(151, 150, 1, '2024-08-20 01:09:07', '2024-08-20 01:09:07'),
(152, 153, 1, '2024-08-20 01:10:10', '2024-08-20 01:10:10'),
(153, 138, 1, '2024-08-20 01:11:13', '2024-08-20 01:11:13'),
(154, 140, 1, '2024-08-20 01:11:43', '2024-08-20 01:11:43'),
(155, 152, 3, '2024-08-21 17:34:24', '2024-08-21 17:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'web', '2024-07-05 03:54:05', '2024-07-03 03:54:18'),
(4, 'votante', 'web', '2024-07-16 15:45:42', '2024-07-16 15:45:42'),
(5, 'operador', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2);

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
  `email` varchar(191) DEFAULT NULL,
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
(1, 'admin', 'fielpvs@gmail.com', NULL, '$2y$10$ItzKq6WD9joSaaBNj3FfyemDZX4qa7qB8LjQ//yM1AsG7QufqTrwu', NULL, NULL, '83QkacII1wdlYo2QBLmrExlBwV9WaqOjJ22DYLVuV972AvRiEnIKTA8rHErP', NULL, NULL, '2024-03-16 18:06:42', '2024-03-16 18:06:42'),
(41, '21280756', NULL, NULL, '$2y$10$vffr0ANRdN8acOr/IOIGwORncJBguibNj1uF3wZff4QFicN3dQvAK', NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:13:50', '2024-07-16 16:13:50'),
(42, '31456587', NULL, NULL, '$2y$10$lYOZu0XGiK93QUK4dXYgJ.k7ZCc46tTfKyRDyHX9NEcFEVE3JTMpq', NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:13:51', '2024-07-16 16:13:51'),
(43, '22345654', NULL, NULL, '$2y$10$wBDFujAKU8bUfEJ3OreLHOVG4eWjWdkVmhJxhNYo/7X1rU/SuO0k.', NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:13:51', '2024-07-16 16:13:51'),
(44, '32678432', NULL, NULL, '$2y$10$QH0PE/STmr2HSBc8TeoW5ewzv026yuFrrYHne3sjY.rm8M.4pEhT2', NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:13:52', '2024-07-16 16:13:52'),
(45, '23123654', NULL, NULL, '$2y$10$zJMsvokRPfZRULM70tJFJO8ZdEqit/hgFeLrU6yhIqgibN4zGHy5q', NULL, NULL, NULL, NULL, NULL, '2024-07-16 16:27:31', '2024-07-16 16:27:31'),
(46, 'operador', 'operador@gmail.com', NULL, '$2y$10$ItzKq6WD9joSaaBNj3FfyemDZX4qa7qB8LjQ//yM1AsG7QufqTrwu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '234234234', NULL, NULL, '$2y$10$6FY12hQrMLVQJ2FWAnpT8OFfNvDGvTEoDaP3y8Fe2ZqKzU5rSFzpC', NULL, NULL, NULL, NULL, NULL, '2024-08-17 10:41:18', '2024-08-17 10:41:18'),
(48, '23234234', NULL, NULL, '$2y$10$61M394V3RAzTCC4dhn.gzeqn1LY85e.HOnNrRXlpWl5Nca6TYBsWe', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:28', '2024-08-19 07:06:28'),
(49, '12456234', NULL, NULL, '$2y$10$j.Vh90i3/tY3SBDtd.8EH.0zeLzTfkDZ2fcJq/L2DB1LQXhYl.8.q', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:29', '2024-08-19 07:06:29'),
(50, '13455346', NULL, NULL, '$2y$10$G/GNxZ0bWcYa5vHQFe0mGep0O8nvb8T6erVfi/NbIKIJ2UaVCK7wG', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:30', '2024-08-19 07:06:30'),
(51, '14564345', NULL, NULL, '$2y$10$I9ZPd3rwVnMFn3FN7PBWHuc/EfmDVqunFRfI2QaidWUs7MozE6.xm', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:31', '2024-08-19 07:06:31'),
(52, '14234433', NULL, NULL, '$2y$10$WsTQBHEh9984hL/qUpuQQuytv.l2bPmP7jw9OAEtfekk7MCIJZDLq', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:31', '2024-08-19 07:06:31'),
(53, '14234543', NULL, NULL, '$2y$10$/JbpMrRB1j2lUCZz8SHOwevf.zJC2Xet7xuF3DlFLAqzgFMjhR69y', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:32', '2024-08-19 07:06:32');

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
(1, '1', 3, NULL, NULL);

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
  ADD KEY `candidatos_ibfk_1` (`id_dependencia_cargos`),
  ADD KEY `candidatos_ibfk_2` (`id_candidato`);

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
  ADD KEY `id_ambito` (`id_ambito`),
  ADD KEY `dependencia_cargo_id_cargo_foreign` (`id_cargo`);

--
-- Indices de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elecciones_ibfk_1` (`id_votante`),
  ADD KEY `elecciones_ibfk_2` (`id_candidato`);

--
-- Indices de la tabla `estado_dependencias`
--
ALTER TABLE `estado_dependencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_dependencias_ibfk_1` (`id_dependencia`),
  ADD KEY `estado_dependencias_ibfk_2` (`id_ambito`);

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
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;

--
-- AUTO_INCREMENT de la tabla `estado_dependencias`
--
ALTER TABLE `estado_dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ministerio`
--
ALTER TABLE `ministerio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  ADD CONSTRAINT `candidatos_ibfk_1` FOREIGN KEY (`id_dependencia_cargos`) REFERENCES `dependencia_cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidatos_ibfk_2` FOREIGN KEY (`id_candidato`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `dependencia_cargo_id_cargo_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dependencia_cargo_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dependencia_cargos_ibfk_1` FOREIGN KEY (`id_ambito`) REFERENCES `ambitos_dependencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD CONSTRAINT `elecciones_ibfk_1` FOREIGN KEY (`id_votante`) REFERENCES `registros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elecciones_ibfk_2` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado_dependencias`
--
ALTER TABLE `estado_dependencias`
  ADD CONSTRAINT `estado_dependencias_ibfk_1` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_dependencias_ibfk_2` FOREIGN KEY (`id_ambito`) REFERENCES `ambitos_dependencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_circuito_id_foreign` FOREIGN KEY (`circuito_id`) REFERENCES `circuitos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

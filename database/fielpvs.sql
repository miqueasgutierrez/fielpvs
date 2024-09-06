-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2024 a las 13:15:52
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
(236, 242, 1, '2024-09-03 05:59:07', '2024-09-03 05:59:07'),
(237, 242, 2, '2024-09-03 05:59:07', '2024-09-03 05:59:07'),
(238, 242, 3, '2024-09-03 05:59:07', '2024-09-03 05:59:07'),
(239, 243, 2, '2024-09-03 05:59:29', '2024-09-03 05:59:29'),
(240, 243, 3, '2024-09-03 05:59:30', '2024-09-03 05:59:30'),
(241, 243, 4, '2024-09-03 05:59:30', '2024-09-03 05:59:30'),
(242, 244, 5, '2024-09-03 05:59:51', '2024-09-03 05:59:51'),
(243, 244, 6, '2024-09-03 05:59:51', '2024-09-03 05:59:51'),
(245, 306, 1, '2024-09-03 07:52:45', '2024-09-03 07:52:45'),
(246, 193, 1, '2024-09-05 02:15:19', '2024-09-05 02:15:19');

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
(146, 1, 'selected', '2024-09-05 09:28:45', '2024-09-05 09:28:45'),
(149, 8, 'selected', '2024-09-05 09:38:03', '2024-09-05 09:38:03'),
(150, 155, 'selected', '2024-09-05 11:42:55', '2024-09-05 11:42:55'),
(151, 6, 'ninguna', '2024-09-05 16:25:14', '2024-09-05 16:25:14');

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
(5, 'AMAZONAS', '2024-08-27 20:43:23', '2024-08-27 20:43:23');

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
(328, 19, 4, 14, NULL, NULL, NULL),
(295, 19, 1, 15, NULL, NULL, NULL),
(297, 19, 1, 17, NULL, NULL, NULL),
(292, 19, 1, 34, NULL, NULL, NULL),
(299, 19, 2, 34, NULL, NULL, NULL),
(293, 19, 1, 35, NULL, NULL, NULL),
(300, 19, 2, 35, NULL, NULL, NULL),
(298, 19, 1, 41, 3, NULL, NULL),
(303, 19, 2, 41, 3, NULL, NULL),
(330, 19, 4, 41, 3, NULL, NULL),
(326, 19, 4, 44, NULL, NULL, NULL),
(327, 19, 4, 45, NULL, NULL, NULL),
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
(3, 21, 1, '1', '2024-07-20 21:05:41', '2024-09-03 11:17:50'),
(4, 8, 1, '1', '2024-07-25 09:50:06', '2024-07-25 09:50:06'),
(5, 25, 1, '1', '2024-07-25 09:51:36', '2024-07-25 09:51:36'),
(6, 14, 1, '1', '2024-07-25 09:52:13', '2024-09-03 10:28:45'),
(7, 12, 1, '1', '2024-07-25 09:52:44', '2024-07-25 09:52:44'),
(8, 19, 1, '1', '2024-07-25 09:53:05', '2024-09-03 07:56:22'),
(9, 16, 1, '1', '2024-07-25 09:53:39', '2024-09-03 07:55:58'),
(10, 23, 3, '1', '2024-07-02 12:40:55', '2024-09-03 07:56:02'),
(11, 25, 4, '1', '2024-07-27 16:51:47', '2024-07-27 17:28:30'),
(12, 25, 2, '1', '2024-07-29 01:50:59', '2024-07-29 01:50:59'),
(13, 8, 2, '1', '2024-07-29 01:51:14', '2024-09-03 10:39:16'),
(14, 14, 2, '1', '2024-07-29 01:51:28', '2024-09-03 10:28:44'),
(17, 19, 2, '1', '2024-07-29 01:52:11', '2024-09-05 10:01:07'),
(18, 8, 4, '1', '2024-07-29 02:05:50', '2024-07-29 02:05:50'),
(19, 14, 4, '1', '2024-07-29 02:06:04', '2024-09-03 07:56:26'),
(20, 19, 4, '1', '2024-07-29 02:06:19', '2024-09-03 07:56:17'),
(21, 12, 2, '1', '2024-07-29 02:06:46', '2024-07-29 02:06:46'),
(22, 12, 4, '1', '2024-07-29 07:34:01', '2024-07-29 07:34:01'),
(23, 27, 2, '0', '2024-07-31 08:32:40', '2024-09-03 10:43:10'),
(24, 16, 2, '1', '2024-08-14 08:01:41', '2024-09-03 10:28:54');

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
-- Estructura de tabla para la tabla `historiaelecciones`
--

CREATE TABLE `historiaelecciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_votante` bigint(20) UNSIGNED NOT NULL,
  `id_candidato` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historiaelecciones`
--

INSERT INTO `historiaelecciones` (`id`, `id_votante`, `id_candidato`, `created_at`, `updated_at`) VALUES
(4, 1, 236, '2024-09-06 00:02:16', '2024-09-06 00:02:16'),
(5, 1, 239, '2024-09-06 00:02:16', '2024-09-06 00:02:16'),
(6, 1, 242, '2024-09-06 00:02:16', '2024-09-06 00:02:16');

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
(5, 'LA NUEVA VIDA', 9, '2024-08-27 20:46:08', '2024-08-27 20:46:08'),
(6, 'JESUCRISTO AMIGO FIEL II', 9, '2024-08-27 20:54:05', '2024-08-27 20:54:05'),
(7, 'IMPACTO DE DIOS II', 9, '2024-08-27 20:54:05', '2024-08-27 20:54:05'),
(8, 'JESUCRISTO AMIGO FIEL I', 9, '2024-08-27 20:54:05', '2024-08-27 20:54:05'),
(9, 'EL RETORNO DE JESUCRISTO', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(10, 'DIOS CON NOSOTROS', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(11, 'IMPACTO DE DIOS III', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(12, 'IMPACTO DE DIOS I', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(13, 'DIOS CON NOSOTROS II', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(14, 'JESUS LUZ DE MI VIDA', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(15, 'CRISTO LA ROCA', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06'),
(16, 'JESUS REY ADMIRABLE', 9, '2024-08-27 20:54:06', '2024-08-27 20:54:06');

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
(210, 1, 'ninguno', '2024-09-05 09:28:45', '2024-09-05 09:28:45'),
(213, 8, 'ninguno', '2024-09-05 09:38:02', '2024-09-05 09:38:02'),
(214, 155, 'PASTOR', '2024-09-05 11:42:55', '2024-09-05 11:42:55'),
(215, 6, 'ninguno', '2024-09-05 16:25:14', '2024-09-05 16:25:14');

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
(4, 'App\\Models\\User', 54),
(4, 'App\\Models\\User', 55),
(4, 'App\\Models\\User', 56),
(4, 'App\\Models\\User', 57),
(4, 'App\\Models\\User', 58),
(4, 'App\\Models\\User', 59),
(4, 'App\\Models\\User', 60),
(4, 'App\\Models\\User', 61),
(4, 'App\\Models\\User', 62),
(4, 'App\\Models\\User', 63),
(4, 'App\\Models\\User', 64),
(4, 'App\\Models\\User', 65),
(4, 'App\\Models\\User', 66),
(4, 'App\\Models\\User', 67),
(4, 'App\\Models\\User', 68),
(4, 'App\\Models\\User', 69),
(4, 'App\\Models\\User', 70),
(4, 'App\\Models\\User', 71),
(4, 'App\\Models\\User', 72),
(4, 'App\\Models\\User', 73),
(4, 'App\\Models\\User', 74),
(4, 'App\\Models\\User', 75),
(4, 'App\\Models\\User', 76),
(4, 'App\\Models\\User', 77),
(4, 'App\\Models\\User', 78),
(4, 'App\\Models\\User', 79),
(4, 'App\\Models\\User', 80),
(4, 'App\\Models\\User', 81),
(4, 'App\\Models\\User', 82),
(4, 'App\\Models\\User', 83),
(4, 'App\\Models\\User', 84),
(4, 'App\\Models\\User', 85),
(4, 'App\\Models\\User', 86),
(4, 'App\\Models\\User', 87),
(4, 'App\\Models\\User', 88),
(4, 'App\\Models\\User', 89),
(4, 'App\\Models\\User', 90),
(4, 'App\\Models\\User', 91),
(4, 'App\\Models\\User', 92),
(4, 'App\\Models\\User', 93),
(4, 'App\\Models\\User', 94),
(4, 'App\\Models\\User', 95),
(4, 'App\\Models\\User', 96),
(4, 'App\\Models\\User', 97),
(4, 'App\\Models\\User', 98),
(4, 'App\\Models\\User', 99),
(4, 'App\\Models\\User', 100),
(4, 'App\\Models\\User', 101),
(4, 'App\\Models\\User', 102),
(4, 'App\\Models\\User', 103),
(4, 'App\\Models\\User', 104),
(4, 'App\\Models\\User', 105),
(4, 'App\\Models\\User', 106),
(4, 'App\\Models\\User', 107),
(4, 'App\\Models\\User', 108),
(4, 'App\\Models\\User', 109),
(4, 'App\\Models\\User', 110),
(4, 'App\\Models\\User', 111),
(4, 'App\\Models\\User', 112),
(4, 'App\\Models\\User', 113),
(4, 'App\\Models\\User', 114),
(4, 'App\\Models\\User', 115),
(4, 'App\\Models\\User', 116),
(4, 'App\\Models\\User', 117),
(4, 'App\\Models\\User', 118),
(4, 'App\\Models\\User', 121),
(4, 'App\\Models\\User', 122),
(4, 'App\\Models\\User', 141),
(4, 'App\\Models\\User', 142),
(4, 'App\\Models\\User', 163),
(4, 'App\\Models\\User', 164),
(4, 'App\\Models\\User', 169),
(4, 'App\\Models\\User', 170),
(4, 'App\\Models\\User', 175),
(4, 'App\\Models\\User', 176),
(4, 'App\\Models\\User', 177),
(4, 'App\\Models\\User', 178),
(4, 'App\\Models\\User', 181),
(4, 'App\\Models\\User', 182),
(4, 'App\\Models\\User', 183),
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
  `cedula` varchar(20) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `edad` varchar(250) DEFAULT NULL,
  `genero` varchar(250) DEFAULT NULL,
  `profesion` varchar(250) DEFAULT NULL,
  `pastor` varchar(255) DEFAULT NULL,
  `ministro_ungido` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(250) DEFAULT NULL,
  `fecha_uncion` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `cedula`, `nombres`, `apellidos`, `fecha_nacimiento`, `telefono`, `edad`, `genero`, `profesion`, `pastor`, `ministro_ungido`, `imagen`, `direccion`, `estado_civil`, `fecha_uncion`, `created_at`, `updated_at`) VALUES
(1, '1568826', 'MIROSLABA', 'RODRIGUEZ', '1971-01-02', '123123213', '53', 'masculino', 'AMA DE CASA', 'J0SE SALAS', 'modal2', '20240827174308.jpg', 'Av.jose Olaya 215', 'VIUDA', '1992', '2024-08-27 20:52:10', '2024-09-05 02:52:31'),
(2, '5360420', 'AURA VIOLETA', 'TENEFFE', '1955-02-03', '0416-4799560', '70', 'F', 'AMA DE CASA', 'BENEDITO MEDINA', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:10', '2024-08-27 20:52:10'),
(3, '7657934', 'MARIA DILUVINA', 'REBOLLEDO', '1952-09-22', NULL, '70', 'F', 'AMA DE CASA', 'ELVIS ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:10', '2024-08-27 20:52:10'),
(4, '8912594', 'CARMEN', 'MEDINA', '1968-11-30', '0416-2686503', '55', 'F', NULL, 'J0SE SALAS', 'NO', NULL, NULL, 'VIUDA', NULL, '2024-08-27 20:52:10', '2024-08-27 20:52:10'),
(5, '8948875', 'CARMEN AIDE', 'REQUENA ARANA', '1967-05-10', NULL, '56', 'F', 'AMA DE CASA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:10', '2024-08-27 20:52:10'),
(6, '8949942', 'MIREYA', 'CORTEZ', '1968-02-03', '0426-7770529', '56', 'F', 'AMA DE CASA', 'BENEDITO MEDINA', NULL, NULL, NULL, 'casado', '1993', '2024-08-27 20:52:10', '2024-09-05 16:25:13'),
(7, '10617061', 'LUIS MANUEL', 'GUTIERREZ RODRIGUEZ', '1970-01-21', '0416-6869937', '54', 'M', 'COMERCIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:10', '2024-08-27 20:52:10'),
(8, '10663723', 'LUIS RAFAEL', 'JIMENEZ', '1975-08-10', '0426-4604044', '48', 'M', NULL, 'LUIS JIMENEZ2', 'modal2', NULL, 'sdfdsfsdf', 'casado', '2007', '2024-08-27 20:52:11', '2024-09-05 09:38:02'),
(9, '10920467', 'DORIS ADINA', 'RANGEL TRUJILLO', '1967-07-19', NULL, '57', 'F', 'COSTURERA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(10, '11759480', 'VILMA YARITZA', 'CAMEJO PINEDA', '1972-07-19', '0416-6869937', '51', 'F', 'COMERCIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(11, '12173342', 'J0SE', 'SALAS', '1968-11-16', '0426-7897288', '54', 'M', 'EMPLEADO', 'J0SE SALAS', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(12, '12173357', 'CARMEN', 'DE SALAS', '1969-06-03', '0426-3380872', '53', 'F', 'AMA DE CASA', 'J0SE SALAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(13, '12451139', 'SONIA EUNIDES', 'MUÑOZ DE RATTIS ', '1971-03-17', NULL, '53', 'F', 'EDUCADORA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(14, '12581527', 'ARNALDO ELEUTERIO', 'COLMENAREZ GARCIA', '1973-10-12', '0426-4397169', '49', 'M', 'COMERCIANTE', 'ARNALDO COLMENARES ', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(15, '12629791', 'BENEDITO ABAB', 'MEDINA PANAMA ', '1975-07-06', '0416-2240791', '48', 'M', NULL, 'BENEDITO MEDINA', 'SI', NULL, NULL, 'CASADO', '2023', '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(16, '12902422', 'YANETZI JOSEFINA', 'HERNANDEZ TOVAR ', '1975-07-07', NULL, '48', 'F', 'OBRERA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(17, '13058820', 'MIRTHA YAMILETH', 'CASTILLO LOPEZ ', '1975-10-10', '0412-0331429', '48', 'F', 'COMERCIANTE', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(18, '13058821', 'KENIA', 'ALVAREZ', '1975-11-19', '0426-1454215', '49', 'F', 'AMA DE CASA', 'BENEDITO MEDINA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(19, '13325723', 'CARMEN OLINDA', 'RANGEL TRUJILLO', '1976-03-27', '0426-4604044', '47', 'F', 'EDUCADORA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(20, '13768965', 'CREBET GREGORIO', 'LARA VASQUEZ', '1979-09-12', '0426-4317586', '44', 'M', NULL, 'CREBET LARA', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(21, '14258269', 'BASILISA', 'ROJAS', '1975-03-10', NULL, '48', 'F', 'AMA DE CASA', 'ELVIS ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(22, '14564146', 'MARIA CRISTINA', 'GARCIA ROSALES', '1979-08-11', NULL, '43', 'F', 'OBRERA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(23, '14565305', 'JOSEFINA DEL CARMEN', 'TIVIDOR LOPEZ ', '1980-01-21', '0412-9237699', '44', 'F', 'OBRERA', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(24, '14810067', 'OSCAR MANUEL', 'PERALTA SIVIRA ', '1980-10-21', '0426-3089887', '43', 'M', 'MILITAR', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(25, '15086678', 'NOHEMI', 'CLARIN', '1968-12-19', NULL, '55', 'F', 'AMA DE CASA', 'ELVIS ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(26, '15303459', 'J0SE ELVIS', 'ROJAS PEREZ', '1977-02-14', '0412-2155798', '47', 'M', 'EDUCADOR', 'ELVIS ROJAS', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(27, '15304412', 'ENYERBERTH MANUEL', 'TRABANCA TOVAR', '1980-06-26', '0416-4389681', '43', 'M', 'PANADERO', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(28, '15304995', 'GRACIELA', 'ANZOATEGUI', '1976-12-03', '0416-6548494', '47', 'F', 'ENFERMERA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(29, '16270747', 'DAYANA DE LOS ANGELES', 'MATERA CAMEJO', '1983-10-13', '0416-9847874', '40', 'F', 'ABOGADA', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(30, '16614945', 'YENNIFER ANOPS', 'NAVAZ LARA', '1983-11-20', '0416-4389681', '40', 'F', 'COMERCIANTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:11', '2024-08-27 20:52:11'),
(31, '17675161', 'JUANA BAUTISTA', 'CAICEDO DE GAMEZ', '1964-10-27', '0426-4419966', '59', 'F', 'ABOGADA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(32, '17675249', 'MERCEDES ELEYDIS', 'GOMEZ ACOSTA', '1984-05-07', '0426-2242122', '39', 'F', 'EDUCADORA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(33, '17676417', 'GLEME YULIER', 'GUERRERO CORREA', '1985-03-07', '0426-1586380', '39', 'F', 'EDUCADORA', 'HANDER GRATEROL', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(34, '17676469', 'YADILKAR', 'MARTINEZ DE ORTEGA', '1985-06-28', '0416-7124660', '38', 'F', 'EMPLEADA', 'J0SE SALAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(35, '17676551', 'YOLEIDA GABRIELITA', 'CALDERON DE BOBADILLA', '1984-12-31', '0426-3313316', '39', 'F', 'OBRERA', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(36, '17676741', 'RAYMON ARMANDO', 'IRON PEREZ', '1984-01-02', '0416-2159274', '43', 'M', 'INDEPENDIENTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(37, '18051987', 'EVA AMARYLIS', 'QUEREBI DE NUÑEZ', '1987-08-16', NULL, '36', 'F', 'SECRETARIA', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(38, '18505992', 'RUTH SMITH', 'GERRERO ESTEPA ', '1983-01-19', '0416-7109213', '41', 'F', 'EDUCADORA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(39, '18506210', 'LUSBELLA ', 'CASTILLO ROSALES', '1981-03-02', '0426-3976058', '43', 'F', 'AMA DE CASA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(40, '18506436', 'KENNEDY ENMANUEL', 'GIMENEZ ABREU', '1987-02-09', '0426-3016529', '37', 'M', 'ENFERMERO', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(41, '18544084', 'NELSON RAFAEL', 'ROJAS', '1985-02-22', '0426-7788377', '39', 'M', 'CARPINTERO', 'NELSON ROJAS', 'SI', NULL, NULL, 'CASADO', '2023', '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(42, '18943736', 'EDGAR J0SE', 'SOTO MENDOZA', '1989-11-20', '0426-1851707', '34', 'M', NULL, 'EDGAR SOTO', 'SI', NULL, NULL, 'CASADO', '2023', '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(43, '19352498', 'J0SE FIDEL ', 'PINZON REQUENA', '1985-04-23', NULL, '38', 'M', 'COMERCIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(44, '19580474', 'MILITZA', 'PEREZ', '1986-05-10', '0416-9945691', '37', 'F', 'AMA DE CASA', 'BENEDITO MEDINA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(45, '19580634', 'KATERIN YADAILYN', 'CASTRO DE PERALTA', '1990-04-12', '0426-2388398', '33', 'F', 'ENFERMERA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(46, '19805309', 'LISCARLIS MERCEDES', 'MIRABAL DAMASIO', '1989-07-02', '0426-4068591', '34', 'F', 'COMERCIANTE', 'ELVIS ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(47, '19805817', 'ZULENNY', 'LEAL', '1988-03-28', NULL, '35', 'F', 'EMPLEADA', 'J0SE SALAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(48, '20018037', 'JOHANAN ELISARIO', 'CADENAS', '1993-03-30', '0412-4161838', '30', 'M', 'INDEPENDIENTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(49, '20087120', 'HANDER ABIU', 'GRATEROL TOMAS', '1989-02-01', '0416-1642495', '35', 'M', 'EMPLEADO PUBLICO', 'HANDER GRATEROL', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(50, '20259162', 'DILSA MANUELA', 'GUEVARA BARRIOS ', '1990-08-19', '0426-1851707', '33', 'F', 'AMA DE CASA', 'EDGAR SOTO', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(51, '21108826', 'RONALD RAFAEL', 'DE HOYOS GONZALEZ', '1992-03-22', '0416-4908398', '32', 'M', 'ING CIVIL', 'RONALD DE HOYOS ', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(52, '21316248', 'ROSI SARAI', 'NAVARRO RAMOS', '1989-09-19', '0426-1218021', '34', 'F', NULL, 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADA', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(53, '22932738', 'HORTENCIO', 'ROMAÑA VALOYE', '1950-08-08', '0416-0417336', '73', 'M', NULL, 'HORTENCIO ROMAÑA', 'SI', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:12', '2024-08-27 20:52:12'),
(54, '25756222', 'LUZ ESTELA', 'ESTEPA', '1968-07-02', '0426-9373048', '55', 'F', 'AMA DE CASA', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'VIUDA', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(55, '27838531', 'FERNANDO', 'DIAZ CAÑA', '1996-06-28', NULL, '27', 'M', 'INDEPENDIENTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'CASADO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(56, '27899315', 'LIDEN LEONEL', 'GOMEZ CASTILLO', '2001-04-14', '0416-2388480', '22', 'M', 'COMERCIANTE', 'HORTENCIO ROMAÑA', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(57, '27950174', 'OSMER YERRINZON XAVIER', 'CHIPIAJE MARTINEZ', '1998-03-29', '0412-4092460', '25', 'M', 'ESTUDIANTE UNIVERSITARIO', 'OMER CHIPIAJE', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(58, '29878213', 'ROBIN ROMAN', 'CALDERON GARCIA', '2000-08-04', NULL, '23', 'M', 'OBRERO', 'NELSON ROJAS', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(59, '29878224', 'EUCLIDES GABRIEL', 'RIVAS CALDERON', '2002-05-09', '0426-4607322', '21', 'M', 'INDEPENDIENTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(60, '30874164', 'VICTOR ALEJANDRO', 'IBARRA ARANZA ', '2004-04-23', '0424-3376200', '19', 'M', 'COMERCIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(61, '31217233', 'MELVIN ALEJANDRO', 'HERNANDEZ DIAZ', '2006-05-12', '0426-7011579', '17', 'M', 'ESTUDIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(62, '32327723', 'GENESIS LAURELIS', 'SALAS', '2006-09-28', '0416-0674034', '17', 'F', 'ESTUDIANTE', 'J0SE SALAS', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(63, '32407435', 'EUKARIS D', 'RIVAS CALDERON', '2005-03-11', '0426-4448945', '19', 'F', 'ESTUDIANTE', 'NELSON ROJAS', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(64, '32658754', 'GENESIS LAURELIS', 'PARRA PINZON', '2005-11-14', NULL, '18', 'F', 'ESTUDIANTE ', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERA', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(65, '32822237', 'JOSUE', 'GARRIDO ANZOATEGUI ', '2005-05-02', '0426-4109252', '18', 'M', 'ESTUDIANTE', 'LUIS JIMENEZ', 'NO', NULL, NULL, 'SOLTERO', NULL, '2024-08-27 20:52:13', '2024-08-27 20:52:13'),
(98, '119798351', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:15:43', '2024-09-03 09:15:43'),
(99, '119747030', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:15:43', '2024-09-03 09:15:43'),
(130, '11979851', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:39:55', '2024-09-03 09:39:55'),
(131, '11977030', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:39:56', '2024-09-03 09:39:56'),
(138, '119798551', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:42:54', '2024-09-03 09:42:54'),
(139, '119770530', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:42:54', '2024-09-03 09:42:54'),
(146, '1195579851', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:49:16', '2024-09-03 09:49:16'),
(147, '1195577030', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:49:16', '2024-09-03 09:49:16'),
(148, '11953579851', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:49:56', '2024-09-03 09:49:56'),
(149, '11955477030', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:49:56', '2024-09-03 09:49:56'),
(153, '119555579851', 'NIOWALDO', 'SANCHEZ', '1974-06-25', '4161110016', '50', 'M', 'TECNICO MEDIO PRESERVACION DE GRANOS', 'DOMINGO COTO', 'SI', NULL, NULL, 'CASADO', '2020', '2024-09-03 09:51:20', '2024-09-03 09:51:20'),
(154, '1197755030', 'CARMEN', 'AVILAN', '1974-05-21', '4262391846', '50', 'F', 'TECNICO SUPERIOR CONSTRUCCION CIVIL', 'DOMINGO COTO', 'NO', NULL, NULL, 'CASADO', NULL, '2024-09-03 09:51:20', '2024-09-03 09:51:20'),
(155, '7777777', 'juan rios', 'rios', '2024-09-25', '2324324', '21', 'masculino', 'ingeniero', 'Carlos jose', 'modal2', '20240903230605.jpg', 'Centro cr 30 #29-05', 'casado', '1992', '2024-09-04 04:06:05', '2024-09-05 11:42:54');

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
(277, 1, 152, '2024-09-05 09:28:44', '2024-09-05 09:28:44'),
(280, 8, 152, '2024-09-05 09:38:02', '2024-09-05 09:38:02'),
(281, 155, 205, '2024-09-05 11:42:55', '2024-09-05 11:42:55'),
(282, 6, 152, '2024-09-05 16:25:13', '2024-09-05 16:25:13');

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
(159, 4, 5, NULL, NULL),
(160, 11, 5, NULL, NULL),
(161, 12, 5, NULL, NULL),
(162, 34, 5, NULL, NULL),
(163, 47, 5, NULL, NULL),
(164, 62, 5, NULL, NULL),
(165, 2, 6, NULL, NULL),
(167, 15, 6, NULL, NULL),
(168, 18, 6, NULL, NULL),
(169, 44, 6, NULL, NULL),
(170, 3, 7, NULL, NULL),
(171, 21, 7, NULL, NULL),
(172, 25, 7, NULL, NULL),
(173, 26, 7, NULL, NULL),
(174, 46, 7, NULL, NULL),
(175, 5, 8, NULL, NULL),
(176, 7, 8, NULL, NULL),
(178, 9, 8, NULL, NULL),
(179, 10, 8, NULL, NULL),
(180, 13, 8, NULL, NULL),
(181, 16, 8, NULL, NULL),
(182, 19, 8, NULL, NULL),
(183, 22, 8, NULL, NULL),
(184, 28, 8, NULL, NULL),
(185, 29, 8, NULL, NULL),
(186, 43, 8, NULL, NULL),
(187, 60, 8, NULL, NULL),
(188, 61, 8, NULL, NULL),
(189, 64, 8, NULL, NULL),
(190, 65, 8, NULL, NULL),
(191, 14, 9, NULL, NULL),
(192, 17, 10, NULL, NULL),
(193, 24, 10, NULL, NULL),
(194, 31, 10, NULL, NULL),
(195, 32, 10, NULL, NULL),
(196, 38, 10, NULL, NULL),
(197, 39, 10, NULL, NULL),
(198, 40, 10, NULL, NULL),
(199, 45, 10, NULL, NULL),
(200, 53, 10, NULL, NULL),
(201, 54, 10, NULL, NULL),
(202, 56, 10, NULL, NULL),
(203, 20, 11, NULL, NULL),
(204, 23, 12, NULL, NULL),
(205, 27, 12, NULL, NULL),
(206, 30, 12, NULL, NULL),
(207, 35, 12, NULL, NULL),
(208, 36, 12, NULL, NULL),
(209, 37, 12, NULL, NULL),
(210, 41, 12, NULL, NULL),
(211, 48, 12, NULL, NULL),
(212, 52, 12, NULL, NULL),
(213, 55, 12, NULL, NULL),
(214, 58, 12, NULL, NULL),
(215, 59, 12, NULL, NULL),
(216, 63, 12, NULL, NULL),
(217, 33, 13, NULL, NULL),
(218, 49, 13, NULL, NULL),
(219, 42, 14, NULL, NULL),
(220, 50, 14, NULL, NULL),
(221, 51, 15, NULL, NULL),
(222, 57, 16, NULL, NULL),
(238, 1, 5, '2024-09-05 09:28:45', '2024-09-05 09:28:45'),
(241, 8, 8, '2024-09-05 09:38:02', '2024-09-05 09:38:02'),
(242, 155, 5, '2024-09-05 11:42:55', '2024-09-05 11:42:55'),
(243, 6, 6, '2024-09-05 16:25:14', '2024-09-05 16:25:14');

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
(1, 'admin', 'fielpvs@gmail.com', NULL, '$2y$10$ItzKq6WD9joSaaBNj3FfyemDZX4qa7qB8LjQ//yM1AsG7QufqTrwu', NULL, NULL, 'i9Izhncw6gnMcDCY2YUscR8D1M2AnYd3V0UjayJiMnmAkZQKCidGQVwar7Ps', NULL, NULL, '2024-03-16 18:06:42', '2024-03-16 18:06:42'),
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
(53, '14234543', NULL, NULL, '$2y$10$/JbpMrRB1j2lUCZz8SHOwevf.zJC2Xet7xuF3DlFLAqzgFMjhR69y', NULL, NULL, NULL, NULL, NULL, '2024-08-19 07:06:32', '2024-08-19 07:06:32'),
(54, '1568826', NULL, NULL, '$2y$10$Ji94KI0rUoYZQUUHmFCB6OLl1UUCWI0wEi.iiFyAQrGcFLo.zhoJa', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:33', '2024-08-27 20:21:33'),
(55, '5360420', NULL, NULL, '$2y$10$RzP3lXPjCRWOY1ad7Sfru.YttF9MHb3FwJI8I6CTU.MbAk8MsTb2u', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:33', '2024-08-27 20:21:33'),
(56, '7657934', NULL, NULL, '$2y$10$m/TJNyzM7kgjbMnNbAwWS.kqAvFowY6mh7NV0tub.tir7MNbCT8XS', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:34', '2024-08-27 20:21:34'),
(57, '8912594', NULL, NULL, '$2y$10$n5n7pf6fe4aRO6fKcB2tI.BUXFeH8Y3eInSBOuEfTUrUwQBr5rZLi', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:35', '2024-08-27 20:21:35'),
(58, '8948875', NULL, NULL, '$2y$10$tcLJC1xcidDLIDCpiJkUeei4wqoCfrjv4RpAwS9IJj0iT7C8o9P0O', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:36', '2024-08-27 20:21:36'),
(59, '8949942', NULL, NULL, '$2y$10$MHcSFEE8dhk2AvWw11uULu9qwC4sV25IASj1uLok.zDUvk4xdIRbu', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:37', '2024-08-27 20:21:37'),
(60, '10617061', NULL, NULL, '$2y$10$/OfYOFE.2KxdkXgZoOWWTuI9ESBblSYfQwUsFJdg0CyG9sI62QqzK', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:37', '2024-08-27 20:21:37'),
(61, '10663723', NULL, NULL, '$2y$10$rmx8cc9IYC.l5t.PXGZCx.CSZzki50F43Ge4h1z688LXV9QWzehp6', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:38', '2024-08-27 20:21:38'),
(62, '10920467', NULL, NULL, '$2y$10$J/shuc1Ur71J0skYB1o0bO9X/wgyme5ZZrTrrYIaAPBNurLkhjtva', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:39', '2024-08-27 20:21:39'),
(63, '11759480', NULL, NULL, '$2y$10$z08Nf2POhKQDcOeWv3QgVeUr1B.FNxrx7kLweqbh66O9PBbeZxNJC', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:39', '2024-08-27 20:21:39'),
(64, '12173342', NULL, NULL, '$2y$10$TN0YMH83rLe9JKt87IrXq.0yGhIuGFugpoeEoMzsv3hQLif6sxKte', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:40', '2024-08-27 20:21:40'),
(65, '12173357', NULL, NULL, '$2y$10$3688IDZM2HKPvat2TgVuT.uH2x5TssEmp.PrcLmi3HAF3CMNdcYI2', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:40', '2024-08-27 20:21:40'),
(66, '12451139', NULL, NULL, '$2y$10$lpgt6qVgcL00K5WrTcZAVuQoXVFHoNm4NqfbsDOJeYGi53r4vZ2WK', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:41', '2024-08-27 20:21:41'),
(67, '12581527', NULL, NULL, '$2y$10$PJ6sNQg/Ow7UYdPfaWQTleMMtWig1NnkoFR8MuWydCOshq0xqZG2.', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:42', '2024-08-27 20:21:42'),
(68, '12629791', NULL, NULL, '$2y$10$Y49pFxmod0l05DE37i58eesC.uSdOXohDBfKL8Qep2LOQUdd9ROiW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:42', '2024-08-27 20:21:42'),
(69, '12902422', NULL, NULL, '$2y$10$gkRPEYkSDKhnQpVsKz4YT.Umu86Hkv/Il8sQqLg.KhMDyFBdhjPRq', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:43', '2024-08-27 20:21:43'),
(70, '13058820', NULL, NULL, '$2y$10$vBxz366D0YJSdp1zmtWjs.rHwTyOphu44kNU1QErOcl92eEcCpSfe', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:43', '2024-08-27 20:21:43'),
(71, '13058821', NULL, NULL, '$2y$10$eAVK/iiEFaTT2gUFNhZM5.xjoEE7/drAFxHyKRSJviA8fNCddsnAG', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:44', '2024-08-27 20:21:44'),
(72, '13325723', NULL, NULL, '$2y$10$XFv2tCIjzaMl30EuBPx6VuoXy26ys/Lx7upIQA7VWSNVGVioYVTjq', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:44', '2024-08-27 20:21:44'),
(73, '13768965', NULL, NULL, '$2y$10$efxxbaMWLy.IDYn7Z4ixcugAaqg0xqRN0SkG2vwvXU9eMLnIlcYyO', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:45', '2024-08-27 20:21:45'),
(74, '14258269', NULL, NULL, '$2y$10$VkCftpB74vk2L2vEHGrD/eTANK1RMyCcNu7Mf1sKp9OpoMBkFsmTe', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:45', '2024-08-27 20:21:45'),
(75, '14564146', NULL, NULL, '$2y$10$QnXbka7eggPz6Z3YAzKGRO43wixtmet1gXKqf9eIX0NSyKAV/ga0y', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:46', '2024-08-27 20:21:46'),
(76, '14565305', NULL, NULL, '$2y$10$r7T6SrzdM/ju9g6KJ3UYiuG3ThLGsG7rGu1P0Ht0jLUs8tytbFYe.', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:46', '2024-08-27 20:21:46'),
(77, '14810067', NULL, NULL, '$2y$10$frlcK717vaxRxWJj8xnfAuugmQZUoppnaP/J9WMKeugbmY1UZvmia', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:46', '2024-08-27 20:21:46'),
(78, '15086678', NULL, NULL, '$2y$10$77zJAhhmnbSg./ISw5FEaeXtnyb3tSsX2fzUJLdeBFOTLu03zHif.', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:47', '2024-08-27 20:21:47'),
(79, '15303459', NULL, NULL, '$2y$10$3WQyOelLdV7Ya0L/hymDWuWLLEP16RJGAg3kIwp79Ah875NQODIme', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:47', '2024-08-27 20:21:47'),
(80, '15304412', NULL, NULL, '$2y$10$lDcjDxHE4Q0XbhrrHqqdOOJHAg.AkRTg9BQ050ITi28mdYRrkJuUa', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:48', '2024-08-27 20:21:48'),
(81, '15304995', NULL, NULL, '$2y$10$3F7VWYmmRcJ8/47v3/HVbO151ClI8Jy/JcVBevfFifktm9s5mlALC', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:48', '2024-08-27 20:21:48'),
(82, '16270747', NULL, NULL, '$2y$10$MfIjJCXY70E34sL3i/Tbk.e7k2ug5Cxap1FgOz2tJzCK.fujiylbu', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:49', '2024-08-27 20:21:49'),
(83, '16614945', NULL, NULL, '$2y$10$kZ4JsOhswNcXjlan2G5/heryLFZpOlrTVNE9LgAqLRaiIHHN/DUj2', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:49', '2024-08-27 20:21:49'),
(84, '17675161', NULL, NULL, '$2y$10$BbyGQHp9blz1CFTuMGNlL.OI3nnQbBBoNBAkA1k3UJmmbX6eQNOeW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:50', '2024-08-27 20:21:50'),
(85, '17675249', NULL, NULL, '$2y$10$6ROpW/IVyzFvwWNVnDVX7OjxOTc1XLSIk41QtHjJSl8/z5ENXyRFW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:50', '2024-08-27 20:21:50'),
(86, '17676417', NULL, NULL, '$2y$10$QlQd/qVLtXu478dgwpx9ueFS28iqfUOwLX61FJVJsmseragEy5cha', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:51', '2024-08-27 20:21:51'),
(87, '17676469', NULL, NULL, '$2y$10$mwQlySn4g7QbT7vGenV27OT1uCLFx.rXgUtkBhN3Z5viiTOVxjLDm', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:51', '2024-08-27 20:21:51'),
(88, '17676551', NULL, NULL, '$2y$10$DsO86LfVMGTQgxlFCIa8Uut3E0EYIFMYbuTeoo5wgldBtpoLX4gMS', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:52', '2024-08-27 20:21:52'),
(89, '17676741', NULL, NULL, '$2y$10$SAcuG/IZOhyYuwbYOuxoquxdN95j16u6Oa5NFuNZ7Mb2mhnBp34du', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:53', '2024-08-27 20:21:53'),
(90, '18051987', NULL, NULL, '$2y$10$6SvLiwehzbR8helXQTrIdeaZlNp/jkFC9uvb.Ot1vBBU81kMPZN96', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:53', '2024-08-27 20:21:53'),
(91, '18505992', NULL, NULL, '$2y$10$yv35INnwR0AmBjFuVjRsO.oTPLhz1IlfL8/djg7Ra3opBtcoQCU3a', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:54', '2024-08-27 20:21:54'),
(92, '18506210', NULL, NULL, '$2y$10$lPfidgKtU3y9sVbDOp888OcDCYzralkw0kSOXPAWYlQxtpiQ52xqe', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:54', '2024-08-27 20:21:54'),
(93, '18506436', NULL, NULL, '$2y$10$GfMZgeL1f5DZLTl6Et7GfOLYNUhyUTJ9PsUGDyRZH3N4NAkkfJ58C', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:55', '2024-08-27 20:21:55'),
(94, '18544084', NULL, NULL, '$2y$10$P0taNTZHoggNvZIhtqJ9Juk7bQAkIg7hEbZxytt8J99GjayeiYuYq', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:55', '2024-08-27 20:21:55'),
(95, '18943736', NULL, NULL, '$2y$10$ACOtHrGKfOjd0wcodVVZDelYEpM.l0B90360Drbkn/XoS0iouQpSO', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:56', '2024-08-27 20:21:56'),
(96, '19352498', NULL, NULL, '$2y$10$AW1a9/Rd58nTtE4GQ2616uQHZ4WgLq5wjV..B6IwE1SfK60z8gc4O', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:57', '2024-08-27 20:21:57'),
(97, '19580474', NULL, NULL, '$2y$10$OOpA41crfTlp5Y4VjaPIk.GRvqoQmZitKeDcY17nj9ZAr1.t5MCFa', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:58', '2024-08-27 20:21:58'),
(98, '19580634', NULL, NULL, '$2y$10$gSmUpeOKZrxU5jExkvqXo.aFmF4KQlToLuQXDEZdE/3/UexuAT3oy', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:59', '2024-08-27 20:21:59'),
(99, '19805309', NULL, NULL, '$2y$10$du3/E8e3j0MoWlT4VWAVVubhxLAoSXKZy2cwn/5b9CSxF1Yh0uWlO', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:21:59', '2024-08-27 20:21:59'),
(100, '19805817', NULL, NULL, '$2y$10$kPAIu6GQmNMwLWUw28x9gem3HkjDKsVMjoeWms/Ltw8zhxwZCA4O.', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:00', '2024-08-27 20:22:00'),
(101, '20018037', NULL, NULL, '$2y$10$dWhG/Sv6ax672UZY4YerVud5Q1BXqwWW.VMfvOUw1ek20BKcESiqS', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:00', '2024-08-27 20:22:00'),
(102, '20087120', NULL, NULL, '$2y$10$F1dHyeiy6GZw/t3vE8P6VermNjkYJXPUHbAPLJqb3Ew6dc4fOEHeW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:01', '2024-08-27 20:22:01'),
(103, '20259162', NULL, NULL, '$2y$10$AE6cMlGmqTD.0t25mlNkSOSXhGEaQ3Qg264fvVAzJBOkv/Zou7Xq.', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:01', '2024-08-27 20:22:01'),
(104, '21108826', NULL, NULL, '$2y$10$8wg8T/SgaSl.Zr0uyCDCuOKoND5YfLZGgreNUcJe6v.BdnKbDuyJW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:01', '2024-08-27 20:22:01'),
(105, '21316248', NULL, NULL, '$2y$10$.uKpfBiaGyJQsOC4QTHQq.m2PVaRqpuGD3IRh85HDnGls2iPBRVqG', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:02', '2024-08-27 20:22:02'),
(106, '22932738', NULL, NULL, '$2y$10$tAsX01S/6T8ZJ3CWytno8ua629kQXtpqwz3muDAvUW5MzzhTZgCi2', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:02', '2024-08-27 20:22:02'),
(107, '25756222', NULL, NULL, '$2y$10$rW7.QfXykw95.qtrkY0DVOGUI2cem2zmsevkXlaZk4Sl76obJf5HW', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:03', '2024-08-27 20:22:03'),
(108, '27838531', NULL, NULL, '$2y$10$WAzoof/Vpp3nLBS5HFdZQ.Js9oc/gj9OrIOX42DCqVFHDcg3wi8/u', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:03', '2024-08-27 20:22:03'),
(109, '27899315', NULL, NULL, '$2y$10$q7ZVK.JmJc8NYqycvRM7leaobLupoNjxccPcTjgWz946yaE059FAa', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:04', '2024-08-27 20:22:04'),
(110, '27950174', NULL, NULL, '$2y$10$BjbKLoQaz2gB9EQn0/5kIuk.VYBCjBRJcSso/7qBjl/iQp02aoFwq', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:04', '2024-08-27 20:22:04'),
(111, '29878213', NULL, NULL, '$2y$10$PjtWFvCEzSWPsS1Ff3jSiOEVjy/k05F4tnVvXJDQD2zqhNX1AoXOC', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:05', '2024-08-27 20:22:05'),
(112, '29878224', NULL, NULL, '$2y$10$NLSpCrJTB8ULQOfGakU2Vu/mcvJNghJB.lnWLY77L8.fOGgpDBFHy', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:05', '2024-08-27 20:22:05'),
(113, '30874164', NULL, NULL, '$2y$10$F/6F0WGtawUDN/MzYDkjruH3WPeurvzUaZEFM87r/C9iMmfBjRiva', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:06', '2024-08-27 20:22:06'),
(114, '31217233', NULL, NULL, '$2y$10$C/fnFji2w5Vc7wFfPZSCGu4thSTMzH9FXLOYcuXIaNbJ2FUmDr0ke', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:06', '2024-08-27 20:22:06'),
(115, '32327723', NULL, NULL, '$2y$10$bivOjHVbPCQfDwv3XU1.V.G.1mPPWpNw.8e9r4VCSJE5D8.z.riiG', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:07', '2024-08-27 20:22:07'),
(116, '32407435', NULL, NULL, '$2y$10$NTpglTY.MFQhSc.CdPqhNOYQRwRbV9GW/DKlWxxPm6e8DvyzkZKdi', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:07', '2024-08-27 20:22:07'),
(117, '32658754', NULL, NULL, '$2y$10$BPgxCLmrUOvAE5iyCZz/iezWQxGIZl7bX3/k1CUhpHncYM8e6nCDa', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:07', '2024-08-27 20:22:07'),
(118, '32822237', NULL, NULL, '$2y$10$UAAFWKNkz4VjSNDNzpCIZuOsepwyUxlHTUlHXs4gKJvpUAxdsVRVK', NULL, NULL, NULL, NULL, NULL, '2024-08-27 20:22:08', '2024-08-27 20:22:08'),
(121, '11979851', NULL, NULL, '$2y$10$uVz2B6ZbUSDqvwpmb2HFfufmcSyLEI6bupVfa5z3BUYEDsorVL0Q6', NULL, NULL, NULL, NULL, NULL, '2024-09-03 08:53:19', '2024-09-03 08:53:19'),
(122, '11977030', NULL, NULL, '$2y$10$lS7NMlSjdU5qzZCcVbzQBO6Muw7Mrr.dMJuTvGjSriVcB9PLtwHOi', NULL, NULL, NULL, NULL, NULL, '2024-09-03 08:53:19', '2024-09-03 08:53:19'),
(141, '119798351', NULL, NULL, '$2y$10$EiU.8GB3.7enJl7AdCCrd.eiQZ7P5lPDxXPvcYuiHf1ktnWmZYtEi', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:15:43', '2024-09-03 09:15:43'),
(142, '119747030', NULL, NULL, '$2y$10$Sqk7UEWshGBsgGUC4.6LbeKtQFfmHUPVAnnBnz0DMKpg/vj35xzQO', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:15:44', '2024-09-03 09:15:44'),
(163, '11979851', NULL, NULL, '$2y$10$O.NK5twUUrFW/zsyiPfgWuyEuXVxneQWBFV1yko22MqfKqGmBWw46', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:39:56', '2024-09-03 09:39:56'),
(164, '11977030', NULL, NULL, '$2y$10$lWiv.5qUB9lgPpDGqu4T6uRjMIj5lG.5D.WH6iFsN875uR5lSnxje', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:39:56', '2024-09-03 09:39:56'),
(169, '119798551', NULL, NULL, '$2y$10$JixNyfPG3czM7PGTiONMkOXsdxo2wIXZnYkqJZgCWPCpC6hqnXrXO', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:42:54', '2024-09-03 09:42:54'),
(170, '119770530', NULL, NULL, '$2y$10$lCnYMFk9UWZFyFg0MN.AHORe0rTYFveDSM89pbPFdtnKJG81RQhhO', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:42:54', '2024-09-03 09:42:54'),
(175, '1195579851', NULL, NULL, '$2y$10$b7hf4n8YXJURSojfKFmz8.bRq.nXX46LZz.U4i9ydfNCJ5fLrXhT.', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:49:16', '2024-09-03 09:49:16'),
(176, '1195577030', NULL, NULL, '$2y$10$0q0y6Z7yGxQQSeAb5SDuGe5TjjyoUJtwFcy1pKr8FlfSn.eTqJA6y', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:49:17', '2024-09-03 09:49:17'),
(177, '11953579851', NULL, NULL, '$2y$10$FLNDiqHg1cX1njhzZCDb/uVAQoouPX4JflwiOkphG7aIlEngoa3qi', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:49:56', '2024-09-03 09:49:56'),
(178, '11955477030', NULL, NULL, '$2y$10$Jg9rYuHQc3tyhUVozj99MuGwEocmqAml7tQLa9QNSewCjZkAHoHbu', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:49:57', '2024-09-03 09:49:57'),
(181, '119555579851', NULL, NULL, '$2y$10$9/l6IO8tqoaoR2hVw5yoxOox9nlfJ6Ltbt/KZdo6qGew0poEXBK/O', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:51:20', '2024-09-03 09:51:20'),
(182, '1197755030', NULL, NULL, '$2y$10$HiOf85CGddR459J8mREUnumZ.WVaGFhGdVT6O6b4j1Ci6cXw9KHXC', NULL, NULL, NULL, NULL, NULL, '2024-09-03 09:51:21', '2024-09-03 09:51:21'),
(183, '7777777', NULL, NULL, '$2y$10$WibCPAFhDE7GmcDJ/Vilf.q/CkEpLyfFKlcxBWru0Yl1auIcMIEjq', NULL, NULL, NULL, NULL, NULL, '2024-09-04 04:06:06', '2024-09-04 04:06:06');

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
(9, '1', 5, '2024-08-27 20:45:37', '2024-08-27 20:45:37');

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
-- Indices de la tabla `historiaelecciones`
--
ALTER TABLE `historiaelecciones`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `categoria_ungidos`
--
ALTER TABLE `categoria_ungidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `dependencia_cargos`
--
ALTER TABLE `dependencia_cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `historiaelecciones`
--
ALTER TABLE `historiaelecciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ministerio`
--
ALTER TABLE `ministerio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `registro_dependencia_cargo`
--
ALTER TABLE `registro_dependencia_cargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT de la tabla `registro_iglesias`
--
ALTER TABLE `registro_iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

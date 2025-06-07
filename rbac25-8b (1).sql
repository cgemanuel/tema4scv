-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-06-2025 a las 06:09:23
-- Versión del servidor: 8.0.41
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rbac25-8b`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `estado_nombre` varchar(45) NOT NULL,
  `estado_valor` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado_nombre`, `estado_valor`) VALUES
(1, 'Activo', 10),
(2, 'Pendiente', 5),
(3, 'Inactivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `genero_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero_nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1739836004),
('m130524_201442_init', 1739836019),
('m190124_110200_add_verification_token_column_to_user_table', 1739836019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `genero_id` smallint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `user_id`, `nombre`, `apellido`, `fecha_nacimiento`, `genero_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'luis', 'luis', '2025-06-06 00:00:00', 1, '2025-06-06 09:52:16', '2025-06-06 09:52:16'),
(3, 2, 'Luis', 'Moo Dzul', '2025-06-11 00:00:00', 1, '2025-06-06 22:50:01', '2025-06-06 22:50:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_valor` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol_nombre`, `rol_valor`) VALUES
(1, 'Usuario', 10),
(2, 'Admin', 20),
(3, 'SuperUsuario', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `tipo_usuario_nombre` varchar(45) NOT NULL,
  `tipo_usuario_valor` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario_nombre`, `tipo_usuario_valor`) VALUES
(1, 'Gratuito', 10),
(2, 'Paga', 30),
(3, 'Premium', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rol_id` int NOT NULL DEFAULT '1',
  `estado_id` int NOT NULL DEFAULT '1',
  `tipo_usuario_id` int NOT NULL DEFAULT '1',
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `rol_id`, `estado_id`, `tipo_usuario_id`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Diego123', '8YzigxY2PEjmknLIczUQ_vm7ZBW0_SNH', '$2y$13$eBHF5qf/96WWEeh9v.1w7ev/8TGTmMV.wvKH6POZu/SrVyUfQo3nC', NULL, 'cdf90080@gmail.com', 1, 1, 1, 10, '2025-03-31 16:41:44', '2025-03-31 16:41:44', 'z4eC-wAt_Rp-3BDHQIzXoC_cfUMGyNQw_1743460903'),
(2, 'Diego1234', '10tQBb3fCVGcVjMIBlZCimK0mYfTJvCO', '$2y$13$DwFEMHFZSeOiRBbdLeQwquJEkDwUO0ubOOO4.KoZ8Ffr5Dz8OLcnu', NULL, 'example123@gmail.com', 3, 1, 1, 10, '2025-05-12 16:31:00', '2025-05-12 16:31:00', 'MEwsxuwEP71Q8YsWKH7qAYQgMAHYTgGx_1747089060'),
(3, 'Emanuel', 'HDe3cGvU_9SYd2AGktYYrOQhcNCex1ha', '$2y$13$f3BFrLOb3rFYMdGGN6a.AuHZ1rCzRSJ7Q3kDOUziJdrSP8WCU5hL6', NULL, 'emanuelcg@gmail.com', 1, 1, 1, 10, '2025-05-12 17:33:04', '2025-05-12 17:33:04', 'H91oaYulxSts_eEx1CXJj0iPK3zjBIyr_1747092784'),
(4, 'aaaa', 'jxjM4jEsCIOIED6KoeWIK5SAcHGQMOdY', '$2y$13$NiPSRYbFA1ihkbEE5hWz2uu2uiDApFe0/wxqJdbF3M3FBAgV7gaPK', NULL, 'ejemplo123@gmail.com', 3, 1, 1, 10, '2025-06-06 08:42:39', '2025-06-06 08:42:39', NULL),
(5, 'ejemplo', 'ykfJk0Umi2BGEArWOWBG1spS0pQ3fNPb', '$2y$13$zHpRPbkbMTqxFzYb.W/RCe7fOgpHG.uoGc5QYnSPbmANSH4UnjYha', NULL, 'ejemplo124@gmail.com', 3, 1, 2, 10, '2025-06-06 09:51:31', '2025-06-06 09:51:31', NULL),
(6, 'Emanuel123', 'yiYpwjaLysaIrUtOpbWtiyHLM8TjZg-s', '$2y$13$0ur4Q0rDqYBwXZt/u810jORaPAeJjEAVaqss1WsHsBaTNnQ66lndW', NULL, 'emanuel123@gmail.com', 1, 1, 1, 10, '2025-06-06 22:47:36', '2025-06-06 22:47:36', 'qKA57cgB62uvMKq-2iVhLqwEOi99BaC3_1749271655');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

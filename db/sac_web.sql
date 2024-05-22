-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sac_web
CREATE DATABASE IF NOT EXISTS `sac_web` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish_ci */;
USE `sac_web`;

-- Volcando estructura para tabla sac_web.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grado_student` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `seccion_id` int(100) DEFAULT NULL,
  `turno` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombres_student` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos_student` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sexo_student` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `edad_student` int(100) DEFAULT NULL,
  `codigo_student` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `f_nacimiento_student` date DEFAULT NULL,
  `representante_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.alumnos: ~0 rows (aproximadamente)
DELETE FROM `alumnos`;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id`, `grado_student`, `seccion_id`, `turno`, `nombres_student`, `apellidos_student`, `sexo_student`, `edad_student`, `codigo_student`, `f_nacimiento_student`, `representante_id`, `created_at`, `updated_at`) VALUES
	(2, 'quinto', 1, 'Mañana', 'jeso', 'URDANETA', 'M', 11, 'JUQUJV', '2012-06-12', 2, '2022-06-06 01:30:40', '2022-06-06 01:30:40');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_persona` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lu_fecha` date DEFAULT NULL,
  `lu_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lu_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lu_condicion` int(100) DEFAULT NULL,
  `ma_fecha` date DEFAULT NULL,
  `ma_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ma_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ma_condicion` int(100) DEFAULT NULL,
  `mi_fecha` date DEFAULT NULL,
  `mi_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `mi_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `mi_condicion` int(100) DEFAULT NULL,
  `ju_fecha` date DEFAULT NULL,
  `ju_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ju_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ju_condicion` int(100) DEFAULT NULL,
  `vi_fecha` date DEFAULT NULL,
  `vi_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `vi_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `vi_condicion` int(100) DEFAULT NULL,
  `sa_fecha` date DEFAULT NULL,
  `sa_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sa_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sa_condicion` int(100) DEFAULT NULL,
  `do_fecha` date DEFAULT NULL,
  `do_entrada` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `do_salida` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `do_condicion` int(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fin_semana` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.asistencia: ~0 rows (aproximadamente)
DELETE FROM `asistencia`;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre_cargo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.cargos: ~0 rows (aproximadamente)
DELETE FROM `cargos`;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`id`, `codigo`, `nombre_cargo`, `categoria`) VALUES
	(1, '0001', 'DIRECTOR', 'Administrativo'),
	(2, '1234', 'docente', 'Docente');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.migrations: ~0 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.personal
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `turno` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_cargo` int(100) DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cedula` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `edad` int(100) DEFAULT NULL,
  `sexo_personal` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci,
  `observacion` text COLLATE utf8mb4_spanish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.personal: ~0 rows (aproximadamente)
DELETE FROM `personal`;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` (`id`, `tipo`, `turno`, `id_cargo`, `nombre`, `apellido`, `cedula`, `f_nacimiento`, `edad`, `sexo_personal`, `correo`, `telefono`, `ciudad`, `direccion`, `observacion`, `created_at`, `updated_at`) VALUES
	(1, 'Administrativo', 'Mañana', 1, 'Eduin', 'Urdaneta', 'V- 27620188', '2000-12-18', 21, 'M', 'eurdaneta526@gmail.com', '+584247261201', 'Santa Bárbara', '5ta av calle principal', NULL, '2022-06-05 16:22:57', '2022-06-05 16:22:58'),
	(2, 'Docente', 'Mañana', 2, 'jesus', 'Urdaneta', 'V- 27620720', '2000-10-31', 22, 'M', 'urdanetjesus@gmail.com', '04147507868', 'santa barbara', 'avenid 10 calle ayacucho', '', '2022-06-06 01:18:46', '2022-06-06 01:21:14');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.representantes
CREATE TABLE IF NOT EXISTS `representantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sexo_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cedula_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `f_nacimiento_r` date DEFAULT NULL,
  `edad_r` int(100) DEFAULT NULL,
  `parentesco` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ciudad_r` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion_r` text COLLATE utf8mb4_spanish_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.representantes: ~0 rows (aproximadamente)
DELETE FROM `representantes`;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` (`id`, `nombres_r`, `apellidos_r`, `sexo_r`, `cedula_r`, `f_nacimiento_r`, `edad_r`, `parentesco`, `telefono_r`, `ciudad_r`, `direccion_r`, `created_at`, `updated_at`) VALUES
	(2, 'daniel', 'urdaneta', 'M', 'V- 13725133', '1970-01-18', 45, 'Madre - Padre', '04147507865', 'santa barbra', 'avenida 10 calle ayacucho', '2022-06-06 01:30:40', '2022-06-06 01:30:40');
/*!40000 ALTER TABLE `representantes` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grado` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `seccion` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_docente` int(100) DEFAULT NULL,
  `turno` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `capacidad` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.secciones: ~0 rows (aproximadamente)
DELETE FROM `secciones`;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` (`id`, `grado`, `seccion`, `id_docente`, `turno`, `capacidad`) VALUES
	(1, 'quinto', 'C', NULL, 'Mañana', 28);
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.situaciones_laborales
CREATE TABLE IF NOT EXISTS `situaciones_laborales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `situacion` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.situaciones_laborales: ~0 rows (aproximadamente)
DELETE FROM `situaciones_laborales`;
/*!40000 ALTER TABLE `situaciones_laborales` DISABLE KEYS */;
/*!40000 ALTER TABLE `situaciones_laborales` ENABLE KEYS */;

-- Volcando estructura para tabla sac_web.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` int(100) DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `range` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla sac_web.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_persona`, `password`, `status`, `range`) VALUES
	(1, 1, '202cb962ac59075b964b07152d234b70', 1, 'Admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

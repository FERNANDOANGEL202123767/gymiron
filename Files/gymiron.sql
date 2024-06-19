/*
 Navicat Premium Data Transfer

 Source Server         : tallerbd_fer
 Source Server Type    : MySQL
 Source Server Version : 50130 (5.1.30-community)
 Source Host           : localhost:3306
 Source Schema         : gymiron

 Target Server Type    : MySQL
 Target Server Version : 50130 (5.1.30-community)
 File Encoding         : 65001

 Date: 06/05/2024 12:44:31
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador`  (
  `nombre_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clave_acceso` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clave_segura` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_completo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nombre_usuario`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of administrador
-- ----------------------------
INSERT INTO `administrador` VALUES ('fer', '2002', '2002', 'Fernando Angel');

-- ----------------------------
-- Table structure for direccion
-- ----------------------------
DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion`  (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_calle` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  INDEX `id_Us`(`id`) USING BTREE,
  CONSTRAINT `id_Us` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of direccion
-- ----------------------------
INSERT INTO `direccion` VALUES ('1715019750', 'ejido de coscomate', 'mexico', 'mexico', '54987');
INSERT INTO `direccion` VALUES ('1715019825', 'Chapa de mota', 'mexico', 'mexico', '5544');

-- ----------------------------
-- Table structure for estado_salud
-- ----------------------------
DROP TABLE IF EXISTS `estado_salud`;
CREATE TABLE `estado_salud`  (
  `id_estado_salud` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `calorias` int(11) NULL DEFAULT NULL,
  `altura` int(11) NULL DEFAULT NULL,
  `peso` int(11) NULL DEFAULT NULL,
  `grasa` decimal(8, 2) NULL DEFAULT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuarioo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_estado_salud`) USING BTREE,
  INDEX `id_usuario_indexx`(`id_usuarioo`) USING BTREE,
  CONSTRAINT `id_usu` FOREIGN KEY (`id_usuarioo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estado_salud
-- ----------------------------
INSERT INTO `estado_salud` VALUES (13, 180, 165, 175, 25.00, 'obesidad', '1715019750');
INSERT INTO `estado_salud` VALUES (14, NULL, NULL, NULL, NULL, NULL, '1715019825');

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario`  (
  `nombre_horario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia3` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia4` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia5` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dia6` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_horario` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_horario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of horario
-- ----------------------------

-- ----------------------------
-- Table structure for inscripciones
-- ----------------------------
DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE `inscripciones`  (
  `id_inscripcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_plan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuarioo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_pago` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `vencimiento` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `renovacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_inscripcion`) USING BTREE,
  INDEX `id_usuario_indexx`(`id_usuarioo`) USING BTREE,
  INDEX `id_plan_indexx`(`id_plan`) USING BTREE,
  CONSTRAINT `id_plann` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario_index` FOREIGN KEY (`id_usuarioo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of inscripciones
-- ----------------------------
INSERT INTO `inscripciones` VALUES (21, 'DIA', '1715019750', '2024-05-06', '1969-12-31', 'yes');
INSERT INTO `inscripciones` VALUES (22, 'ANUALIDAD', '1715019825', '2024-05-06', '2024-05-05', 'yes');

-- ----------------------------
-- Table structure for planes
-- ----------------------------
DROP TABLE IF EXISTS `planes`;
CREATE TABLE `planes`  (
  `id_plan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_plan` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `validez` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `activo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_plan`) USING BTREE,
  INDEX `id_plan`(`id_plan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of planes
-- ----------------------------
INSERT INTO `planes` VALUES ('ANUALIDAD', 'Anualidad', 'Acceso ilimitado al gimnasio por un aï¿½o completo.', '12', 3800, 'si');
INSERT INTO `planes` VALUES ('DIA', 'Plan Diario', 'Acceso diario al gimnasio por 1 dia.', '1 dia', 45, 'sí');
INSERT INTO `planes` VALUES ('EQNLPG', 'anualidad', 'duracion de 12 meses', '12', 3800, 'si');
INSERT INTO `planes` VALUES ('MEDIA_ANUALIDAD', 'Media Anualidad', 'Acceso ilimitado al gimnasio por medio año.', '6 meses', 1820, 'sí');
INSERT INTO `planes` VALUES ('MES', 'Plan Mensual', 'Acceso mensual ilimitado al gimnasio.', '1 mes', 380, 'sí');
INSERT INTO `planes` VALUES ('SEMANA', 'Plan Semanal', 'Acceso semanal al gimnasio por 180 días.', '7 días', 180, 'sí');
INSERT INTO `planes` VALUES ('TRIMESTRE', 'Plan Trimestral', 'Acceso trimestral al gimnasio.', '3 meses', 990, 'sí');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE INDEX `correo_electronico`(`correo_electronico`) USING BTREE,
  INDEX `id_usuario`(`id_usuario`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1715019750', 'fernando angel', 'Masculino', '5544887766', 'fernando@gmail.com', '2002-03-21', '2024-05-06');
INSERT INTO `usuarios` VALUES ('1715019825', 'Ambar Itzel', 'Femenina', '4477995566', 'AmbarItzel@gmail.com', '2003-08-14', '2024-05-06');

SET FOREIGN_KEY_CHECKS = 1;

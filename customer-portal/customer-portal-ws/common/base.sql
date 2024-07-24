-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.23 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla didactic_didacticos_01.tipo_categorias: 6 rows
/*!40000 ALTER TABLE `tipo_categorias` DISABLE KEYS */;
INSERT INTO `tipo_categorias` (`id`, `tipo`, `link`, `dto_tag`, `categoria`, `descuento`, `icon`, `clase_estilo`, `exento_iva`, `eliminado`) VALUES
	(1, 'libro', 'libros', 'libros', 'Libros', 0.3, 'icon-books', '', 1, 0),
	(3, 'juguete', 'juguetes', 'juguetes', 'Juguetes', 0, 'icon-toys', 'green', 0, 0),
	(4, 'escolar', 'escolares', 'escolares', 'Escolar', 0, 'icon-school-bag', 'purple', 0, 0),
	(2, 'juego', 'didacticos', 'didacticos', 'Didácticos', 0, 'icon-didacticos', 'blue', 0, 0),
	(6, 'bazar', 'bazar', 'bazar', 'Bazar', 0, '', '', 0, 0),
	(7, 'blanco', 'blancos', 'blancos', 'Blancos', 0.2, '', '', 0, 1);
/*!40000 ALTER TABLE `tipo_categorias` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

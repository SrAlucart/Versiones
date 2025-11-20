-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 22-10-2024 a las 03:04:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rodante`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`ucykktbclaprzz87`@`%` PROCEDURE `EnviarNotificacion` (IN `p_IdUsuarioAdmin` INT, IN `p_IdParqueadero` INT, IN `p_Mensaje` TEXT)   BEGIN
    DECLARE v_esAdmin BOOLEAN;
    CALL VerificarPermisoAdmin(p_IdUsuarioAdmin, v_esAdmin);
    
    IF v_esAdmin THEN
        INSERT INTO notificaciones (IdUsuario, IdParqueadero, Mensaje)
        VALUES (p_IdUsuarioAdmin, p_IdParqueadero, p_Mensaje);
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Usuario no tiene permisos para enviar notificaciones';
    END IF;
END$$

CREATE DEFINER=`ucykktbclaprzz87`@`%` PROCEDURE `RegistrarAccionAdmin` (IN `p_IdUsuario` INT, IN `p_TipoAccion` VARCHAR(50), IN `p_TablaAfectada` VARCHAR(50), IN `p_IdRegistroAfectado` INT, IN `p_Descripcion` TEXT)   BEGIN
    DECLARE v_esAdmin BOOLEAN;
    CALL VerificarPermisoAdmin(p_IdUsuario, v_esAdmin);
    
    IF v_esAdmin THEN
        INSERT INTO acciones_admin (IdUsuario, TipoAccion, TablaAfectada, IdRegistroAfectado, Descripcion)
        VALUES (p_IdUsuario, p_TipoAccion, p_TablaAfectada, p_IdRegistroAfectado, p_Descripcion);
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Usuario no tiene permisos de administrador';
    END IF;
END$$

CREATE DEFINER=`ucykktbclaprzz87`@`%` PROCEDURE `VerificarPermisoAdmin` (IN `p_IdUsuario` INT, OUT `p_EsAdmin` BOOLEAN)   BEGIN
    SELECT COUNT(*) INTO p_EsAdmin 
    FROM usuario 
    WHERE IdUsuario = p_IdUsuario AND Rol = 'admin';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones_admin`
--

CREATE TABLE `acciones_admin` (
  `IdAccionAdmin` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `TipoAccion` enum('agregar','eliminar','cambiar_estado','notificar') NOT NULL,
  `TablaAfectada` varchar(50) NOT NULL,
  `IdRegistroAfectado` int(11) NOT NULL,
  `FechaAccion` datetime NOT NULL DEFAULT current_timestamp(),
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `acciones_admin`
--

INSERT INTO `acciones_admin` (`IdAccionAdmin`, `IdUsuario`, `TipoAccion`, `TablaAfectada`, `IdRegistroAfectado`, `FechaAccion`, `Descripcion`) VALUES
(1, 2, 'cambiar_estado', 'reserva', 34, '2024-10-21 23:51:06', 'Cambio de estado de reserva a Finalizado'),
(2, 2, 'notificar', 'parqueadero', 2, '2024-10-21 23:51:06', 'Notificación de mantenimiento programado'),
(3, 3, 'agregar', 'parqueadero', 11, '2024-10-21 23:51:06', 'Creación de nuevo espacio de parqueadero'),
(4, 2, 'eliminar', 'reserva', 36, '2024-10-21 23:51:06', 'Cancelación de reserva por solicitud del usuario'),
(5, 3, 'cambiar_estado', 'parqueadero', 4, '2024-10-21 23:51:06', 'Actualización de espacios disponibles'),
(6, 2, 'notificar', 'usuario', 5, '2024-10-21 23:51:06', 'Notificación de cambio en horario de atención'),
(7, 3, 'agregar', 'tarifa', 10, '2024-10-21 23:51:06', 'Agregación de nueva tarifa especial'),
(8, 2, 'cambiar_estado', 'entradassalidas', 15, '2024-10-21 23:51:06', 'Corrección de hora de salida'),
(9, 3, 'notificar', 'parqueadero', 7, '2024-10-21 23:51:06', 'Aviso de cierre temporal por mantenimiento'),
(10, 2, 'eliminar', 'vehiculo', 35, '2024-10-21 23:51:06', 'Eliminación de vehículo por solicitud del usuario'),
(11, 2, 'cambiar_estado', 'reserva', 34, '2024-10-21 23:54:24', 'Actualización de estado de reserva a completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradassalidas`
--

CREATE TABLE `entradassalidas` (
  `IdEntradasSalidas` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `HoraEntrada` time DEFAULT NULL,
  `HoraSalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradassalidas`
--

INSERT INTO `entradassalidas` (`IdEntradasSalidas`, `IdVehiculo`, `IdReserva`, `HoraEntrada`, `HoraSalida`) VALUES
(11, 31, 32, '09:05:00', '13:55:00'),
(12, 32, 33, '10:10:00', '15:50:00'),
(13, 33, 34, '08:02:00', '11:58:00'),
(14, 34, 35, '11:05:00', '14:55:00'),
(15, 35, 36, '13:07:00', '17:53:00'),
(16, 36, 37, '09:35:00', '14:25:00'),
(17, 37, 38, '12:03:00', '16:57:00'),
(18, 38, 39, '10:32:00', '15:28:00'),
(19, 39, 40, '08:33:00', '13:27:00'),
(20, 40, 41, '14:05:00', '18:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `IdNotificacion` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdParqueadero` int(11) NOT NULL,
  `Mensaje` text NOT NULL,
  `FechaNotificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` enum('leida','no_leida') NOT NULL DEFAULT 'no_leida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`IdNotificacion`, `IdUsuario`, `IdParqueadero`, `Mensaje`, `FechaNotificacion`, `Estado`) VALUES
(1, 2, 2, 'Mantenimiento programado para el día 25/10/2024', '2024-10-21 23:51:33', 'no_leida'),
(2, 2, 3, 'Actualización de tarifas a partir del próximo mes', '2024-10-21 23:51:33', 'leida'),
(3, 3, 4, 'Espacios limitados por evento especial', '2024-10-21 23:51:33', 'no_leida'),
(4, 2, 5, 'Cierre temporal por reparaciones', '2024-10-21 23:51:33', 'leida'),
(5, 3, 6, 'Nuevos espacios disponibles', '2024-10-21 23:51:33', 'no_leida'),
(6, 2, 7, 'Cambio en horario de atención', '2024-10-21 23:51:33', 'no_leida'),
(7, 3, 8, 'Promoción especial para usuarios frecuentes', '2024-10-21 23:51:33', 'leida'),
(8, 2, 9, 'Actualización del sistema de seguridad', '2024-10-21 23:51:33', 'no_leida'),
(9, 3, 10, 'Nuevo sistema de reservas implementado', '2024-10-21 23:51:33', 'leida'),
(10, 2, 11, 'Recordatorio de renovación de tarifas', '2024-10-21 23:51:33', 'no_leida'),
(11, 2, 2, 'Notificación importante: Mantenimiento programado para mañana', '2024-10-21 23:54:24', 'no_leida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero`
--

CREATE TABLE `parqueadero` (
  `IdParqueadero` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `totalEspacios` int(11) NOT NULL,
  `EspaciosDisponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parqueadero`
--

INSERT INTO `parqueadero` (`IdParqueadero`, `Nombre`, `Direccion`, `totalEspacios`, `EspaciosDisponibles`) VALUES
(2, 'Parqueadero Central', 'Calle 1 #123', 100, 50),
(3, 'Estacionamiento Norte', 'Avenida 2 #456', 80, 30),
(4, 'Parking Sur', 'Carrera 3 #789', 120, 70),
(5, 'Garaje Este', 'Calle 4 #321', 90, 40),
(6, 'Aparcamiento Oeste', 'Avenida 5 #654', 110, 60),
(7, 'Plaza de Parking', 'Carrera 6 #987', 70, 35),
(8, 'Estacionamiento Express', 'Calle 7 #741', 60, 25),
(9, 'Parqueadero 24 Horas', 'Avenida 8 #852', 150, 100),
(10, 'Eco Parking', 'Carrera 9 #963', 40, 20),
(11, 'Zona de Estacionamiento', 'Calle 10 #159', 130, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_admin`
--

CREATE TABLE `permisos_admin` (
  `IdPermiso` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `GestionReservas` tinyint(1) DEFAULT 0,
  `GestionUsuarios` tinyint(1) DEFAULT 0,
  `GestionParqueaderos` tinyint(1) DEFAULT 0,
  `GestionNotificaciones` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos_admin`
--

INSERT INTO `permisos_admin` (`IdPermiso`, `IdUsuario`, `GestionReservas`, `GestionUsuarios`, `GestionParqueaderos`, `GestionNotificaciones`) VALUES
(1, 2, 1, 1, 1, 1),
(2, 3, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registropago`
--

CREATE TABLE `registropago` (
  `IdRegistroPago` int(11) NOT NULL,
  `IdTarifa` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registropago`
--

INSERT INTO `registropago` (`IdRegistroPago`, `IdTarifa`, `IdUsuario`, `IdReserva`) VALUES
(71, 1, 2, 32),
(72, 2, 3, 33),
(73, 3, 4, 34),
(74, 4, 5, 35),
(75, 5, 6, 36),
(76, 6, 7, 37),
(77, 7, 8, 38),
(78, 8, 9, 39),
(79, 9, 10, 40),
(80, 10, 11, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `IdReserva` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `FechaReserva` date NOT NULL,
  `Estado` enum('Reservado','Cancelado','Finalizado') NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `CantidadEspacios` int(11) NOT NULL,
  `IdParqueadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`IdReserva`, `IdUsuario`, `FechaReserva`, `Estado`, `IdVehiculo`, `CantidadEspacios`, `IdParqueadero`) VALUES
(32, 2, '2024-06-23', 'Reservado', 31, 1, 2),
(33, 3, '2024-06-24', 'Reservado', 32, 1, 3),
(34, 4, '2024-06-25', 'Finalizado', 33, 1, 4),
(35, 5, '2024-06-26', 'Reservado', 34, 1, 5),
(36, 6, '2024-06-27', 'Cancelado', 35, 1, 6),
(37, 7, '2024-06-28', 'Reservado', 36, 1, 7),
(38, 8, '2024-06-29', 'Reservado', 37, 1, 8),
(39, 9, '2024-06-30', 'Finalizado', 38, 1, 9),
(40, 10, '2024-07-01', 'Reservado', 39, 1, 10),
(41, 11, '2024-07-02', 'Reservado', 40, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `IdTarifa` int(11) NOT NULL,
  `MetodoPago` enum('Prepago','Pospago') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`IdTarifa`, `MetodoPago`) VALUES
(1, 'Prepago'),
(2, 'Pospago'),
(3, 'Prepago'),
(4, 'Pospago'),
(5, 'Prepago'),
(6, 'Pospago'),
(7, 'Prepago'),
(8, 'Pospago'),
(9, 'Prepago'),
(10, 'Pospago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `FechaRegistro` date NOT NULL,
  `Rol` enum('usuario','admin') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Apellido`, `Email`, `Contrasena`, `FechaRegistro`, `Rol`) VALUES
(2, 'Juan', 'Pérez', 'juan.perez@email.com', 'contraseña123', '2024-01-15', 'admin'),
(3, 'María', 'González', 'maria.gonzalez@email.com', 'clave456', '2024-01-20', 'admin'),
(4, 'Carlos', 'Rodríguez', 'carlos.rodriguez@email.com', 'segura789', '2024-02-01', 'usuario'),
(5, 'Ana', 'Martínez', 'ana.martinez@email.com', 'ana1234', '2024-02-10', 'usuario'),
(6, 'Luis', 'Sánchez', 'luis.sanchez@email.com', 'luisito567', '2024-02-15', 'usuario'),
(7, 'Laura', 'Fernández', 'laura.fernandez@email.com', 'laura890', '2024-03-01', 'usuario'),
(8, 'Pedro', 'López', 'pedro.lopez@email.com', 'pedrito123', '2024-03-10', 'usuario'),
(9, 'Sofía', 'Díaz', 'sofia.diaz@email.com', 'sofi456', '2024-03-15', 'usuario'),
(10, 'Miguel', 'Torres', 'miguel.torres@email.com', 'miguelt789', '2024-03-20', 'usuario'),
(11, 'Elena', 'Ruiz', 'elena.ruiz@email.com', 'elenita234', '2024-03-25', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `IdVehiculo` int(11) NOT NULL,
  `TipoVehiculo` enum('Carro','Moto','Bicicleta') NOT NULL,
  `Placa` varchar(10) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`IdVehiculo`, `TipoVehiculo`, `Placa`, `IdUsuario`) VALUES
(31, 'Carro', 'ABC123', 2),
(32, 'Moto', 'XYZ789', 3),
(33, 'Bicicleta', 'BIC001', 4),
(34, 'Carro', 'DEF456', 5),
(35, 'Moto', 'MNO321', 6),
(36, 'Carro', 'GHI789', 7),
(37, 'Bicicleta', 'BIC002', 8),
(38, 'Moto', 'PQR654', 9),
(39, 'Carro', 'JKL987', 10),
(40, 'Bicicleta', 'BIC003', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones_admin`
--
ALTER TABLE `acciones_admin`
  ADD PRIMARY KEY (`IdAccionAdmin`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `entradassalidas`
--
ALTER TABLE `entradassalidas`
  ADD PRIMARY KEY (`IdEntradasSalidas`),
  ADD KEY `IdVehiculo` (`IdVehiculo`),
  ADD KEY `IdReserva` (`IdReserva`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`IdNotificacion`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdParqueadero` (`IdParqueadero`);

--
-- Indices de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD PRIMARY KEY (`IdParqueadero`);

--
-- Indices de la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  ADD PRIMARY KEY (`IdPermiso`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `registropago`
--
ALTER TABLE `registropago`
  ADD PRIMARY KEY (`IdRegistroPago`),
  ADD KEY `IdTarifa` (`IdTarifa`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdReserva` (`IdReserva`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdVehiculo` (`IdVehiculo`),
  ADD KEY `IdParqueadero` (`IdParqueadero`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`IdTarifa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`IdVehiculo`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones_admin`
--
ALTER TABLE `acciones_admin`
  MODIFY `IdAccionAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `entradassalidas`
--
ALTER TABLE `entradassalidas`
  MODIFY `IdEntradasSalidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `IdNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  MODIFY `IdParqueadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  MODIFY `IdPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registropago`
--
ALTER TABLE `registropago`
  MODIFY `IdRegistroPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `IdTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `IdVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones_admin`
--
ALTER TABLE `acciones_admin`
  ADD CONSTRAINT `acciones_admin_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `entradassalidas`
--
ALTER TABLE `entradassalidas`
  ADD CONSTRAINT `entradassalidas_ibfk_1` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculo` (`IdVehiculo`),
  ADD CONSTRAINT `entradassalidas_ibfk_2` FOREIGN KEY (`IdReserva`) REFERENCES `reserva` (`IdReserva`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`IdParqueadero`) REFERENCES `parqueadero` (`IdParqueadero`);

--
-- Filtros para la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  ADD CONSTRAINT `permisos_admin_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `registropago`
--
ALTER TABLE `registropago`
  ADD CONSTRAINT `registropago_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `registropago_ibfk_3` FOREIGN KEY (`IdReserva`) REFERENCES `reserva` (`IdReserva`),
  ADD CONSTRAINT `registropago_ibfk_4` FOREIGN KEY (`IdTarifa`) REFERENCES `tarifa` (`IdTarifa`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculo` (`IdVehiculo`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`IdParqueadero`) REFERENCES `parqueadero` (`IdParqueadero`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

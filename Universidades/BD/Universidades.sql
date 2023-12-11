create DATABASE logincrud1;
use logincrud1;

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_universidad` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL CHECK (`calificacion` >= 1 and `calificacion` <= 5),
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_usuarios`
--

CREATE TABLE `reg_usuarios` (
  `nom` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reg_usuarios`
--

INSERT INTO `reg_usuarios` (`nom`, `pass`, `registro`) VALUES
('sql=1', '123456789', '2023-11-13 09:13:43'),
('Sofía Torres', '222222', '2023-11-13 10:16:55'),
('María Rodríguez', 'a99d44873200f9ffd7e10a162984a08390dc69880b8a23be76', '2023-12-06 07:27:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `precio_inscripcion` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre`, `ubicacion`, `precio_inscripcion`, `descripcion`) VALUES
(1, 'UNAM', 'Ciudad de México', 5000, 'La UNAM, ubicada en la Ciudad de México, es la institución educativa más grande y prestigiosa de México. Con una rica historia y una oferta académica diversa, la UNAM se destaca por su compromiso con la excelencia en la investigación y la educación.'),
(2, 'UPPE', 'Pénjamo Guanajuato', 1015, 'La UPPE, en Penjamo, se distingue por su enfoque técnico y práctico. Con instalaciones modernas, brinda programas especializados en ingeniería y tecnología. La UPPE fomenta la innovación y la formación integral de sus estudiantes, preparándolos para desta'),
(3, 'TEC', 'Monterrey', 7818, 'El TEC es conocido por su enfoque práctico y orientado a la tecnología. Situado en un campus moderno, esta institución destaca en programas de ingeniería y ciencias aplicadas, proporcionando a los estudiantes las habilidades necesarias para destacar en la'),
(4, 'Colmex', 'Celaya Guanajuato', 0, 'El Colmex se distingue por su excelencia en ciencias sociales y humanidades. Con una tradición académica sólida, esta institución se enfoca en la investigación y la formación de líderes en disciplinas como economía, sociología y ciencias políticas.'),
(5, 'Itam', 'Juventino Rosas Guanajuato', 7120, 'El Itam es reconocido por su compromiso con la autonomía académica y la formación integral de líderes en el ámbito empresarial y político. Ubicado en un campus moderno, el instituto destaca por sus programas de economía, administración y derecho.\r\n\r\n'),
(6, 'UG', 'Estado de Guanajuato', 1840, 'La UP es una universidad que se destaca por su enfoque dinámico y flexible. Con programas académicos variados, busca adaptarse a las necesidades cambiantes del mercado laboral y brindar a los estudiantes las herramientas necesarias para tener éxito en sus'),
(7, 'UP', 'Estado de Guanajuato', 1000, 'La UG, en Guanajuato, destaca por su rica historia y compromiso con la excelencia académica. Su campus combina tradición e innovación, ofreciendo programas diversos en un entorno inspirador. Con énfasis en investigación y cultura, la UG forma una comunida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nom` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nom`, `correo`, `pass`, `id`) VALUES
('Paul Christian', 'admin@gmail.com', '82e24a7cd4b49b9c24875d104372c5d040b8b95a932798e21b', 1),
('Juan Pérez', 'juanperez@gmail.com', '0b7e59fc34332c0367f5aa8dcf68a6b2208b09d3c8f90b831e', 2),
('patito', 'anagarcia@hotmail.com', 'f7cc441ce90575a62bdd7e24f854e30cc88584359c48adcc90', 3),
('Luis Hernández', 'luishernandez@yahoo.com', '2270d16a1e6e07e4cbdf6071df78f3744931ac097f5004e03b', 4),
('12345678910@gmail.com', '12345678910@gmail.com', '123', 15),
('gg', 'gg@gmail.com', '123', 16),
('Pablo Ramírez', 'pabloramirez@yahoo.com', '80255067769e3b49e6080c628e5de9d481b531a1d80aaf58ac', 6),
('sergio bryan', 'andreacastro@gmail.com', '723ccc56b34a09552dbccc574fa979a0580f732471f776d1e7', 7),
('sergio', '22020200037@uppenjamo.edu.mc', '723ccc56b34a09552dbccc574fa979a0580f732471f776d1e7', 8),
('antonio hub', 'antonio@gmail.com', '06b092addba3f0b4f67c05de2b26003a70997404975f9bdbd3', 9),
('xds24', 'hola12@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e99', 10),
('juan', '22q@gmail.com', '123', 11),
('12345', 'qwe@gmail.com', '123', 12),
('3456', '678@gmai.com', '123', 13),
('1234567890@gmail.com', '1234567890@gmail.com', '$2y$10$PKhOQpnDVEgAnUQn18w1nOd/2KSalu.5EAbGLu.yzut', 14),
('gggg', 'gggg@gmail.com', '123', 17),
('ana', 'ana@gmail.com', '1234', 18),
('alexisgay', 'alexisgay@gmail.com', '123', 19),
('yajala', 'ahuevo@gmail.com', '123', 20),
('sexwin', 'sexwin@gmail.com', '$2y$10$W/8M6AjsmZOoyIdFWhqT3OqULcwifjJwYdBK0HLmj2T', 21),
('edwin', 'edwin@gmail.com', '$2y$10$nXqlkJo6ENfFvDORxOgbPuvAQs0zKUp7TnijjWW9gxx', 22),
('fercho', 'fercho@gmail.com', '123', 23),
('098765432', 'ff@gmail.com', '123', 24),
('xds36g@gmail.com', 'xds36g@gmail.com', '$2y$10$7MJHZ5xuDK1zCGRUCpl5TuZjx9v8Vq/yJ21cYxqzO5M', 25);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `logincrud1` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO reg__logincrud2(id,nom,registro)
VALUES(new.nom, new.nom, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `usuarios_AI` AFTER DELETE ON `usuarios` FOR EACH ROW INSERT INTO reg_usuarios(nom,pass,registro)
VALUES(old.nom, old.pass, now())
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_universidad` (`id_universidad`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_universidad`) REFERENCES `universidad` (`id`);
COMMIT;

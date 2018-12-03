-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-12-2018 a las 01:07:31
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id4489618_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `titulo` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `tarjeta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(5000) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidadcompra` int(11) NOT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `formato` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `publicaciondate` varchar(50) NOT NULL,
  `destacado` bit(1) DEFAULT b'0',
  `autor` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `detalle`, `precio`, `stock`, `image`, `cantidadcompra`, `genero`, `formato`, `editorial`, `publicaciondate`, `destacado`, `autor`) VALUES
(1, 'Don Quijote de la Mancha', 'Don Quijote de la Manchaa​ es una novela escrita por el español Miguel de Cervantes Saavedra. Publicada su primera parte con el título de El ingenioso hidalgo don Quijote de la Mancha a comienzos de 1605, es la obra más destacada de la literatura española y una de las principales de la literatura universal.​ En 1615 apareció su continuación con el título de Segunda parte del ingenioso caballero don Quijote de la Mancha. El Quijote de 1605 se publicó dividido en cuatro partes; pero al aparecer el Quijote de 1615 en calidad de Segunda parte de la obra, quedó revocada de hecho la partición en cuatro secciones del volumen publicado diez años antes por Cervantes.\r\n\r\n', 35.58, 18, '<img src=\"imgarticulos/Quijote.jpg\">', 257, 'Novela', 'Tapa dura', 'Anaconda', '1615', b'1', 'Miguel de Cervantes'),
(2, '100 años de soledad', 'Cien años de soledad es una novela del escritor colombiano Gabriel García Márquez, ganador del Premio Nobel de Literatura en 1982. Es considerada una obra maestra de la literatura hispanoamericana y universal, así como una de las obras más traducidas y leídas en español. Fue catalogada como una de las obras más importantes de la lengua castellana durante el IV Congreso Internacional de la Lengua Española celebrado en Cartagena de Indias en marzo de 2007. Fue incluida en la lista de las 100 mejores novelas en español del siglo XX del periódico español El Mundo,​ en la lista de los 100 libros del siglo XX del diario francés Le Monde y en los 100 mejores libros de todos los tiempos del Club de libros de Noruega.\r\n\r\n', 32.55, 20, '<img src=\"imgarticulos/soledad.jpg\">', 9, 'Novela', 'Tapa dura', 'Ilustraciones Fabela', '1967', b'0', 'Gabriel García Márquez'),
(3, 'Todos somos piratas', 'En una sociedad donde manda el deber y falta placer, donde corremos de un lado para otro constantemente y donde apenas hablamos los unos con los otros a menos que no sea por medio del teléfono, ¿tenemos tiempo para vivir grandes aventuras?\r\n\r\nHandler lleva esta pregunta a Gwen, una niña de catorce años que, como todos los adolescentes de su edad, no sabe qué esperan los adultos de ella y se muere por dar rienda suelta a su rebeldía. Su padre, Phil, es un productor de radio que busca una historia que apasione a América. Mientras sobrevive a su latosa existencia, trata de no acostarse con su secretaria, conseguir un buen programa para pagar su nueva y carísima casa, y encauzar a su hija, que ha desarrollado unas inadecuadas aptitudes cleptómanas. ', 10.2, 19, '<img src=\"imgarticulos/piratas.jpg\">', 66, 'Novela', 'Tapa blanda', 'Siruela', '2001', b'0', 'Daniel Handler'),
(4, 'Harry Potter 1', 'Harry Potter se ha quedado huérfano y vive en casa de sus abominables tíos y del insoportable primo Dudley. Harry se siente muy triste y solo, hasta que un buen día recibe una carta que cambiará su vida para siempre. En ella le comunican que ha sido aceptado como alumno en el colegio interno Hogwarts de magia y hechicería. A partir de ese momento, la suerte de Harry da un vuelco espectacular.', 39.99, 19, '<img src=\"imgarticulos/potter1.jpg\">', 21, 'Novela', 'Tapa dura', 'Salamanca', '1997', b'0', 'J.K. Rowling'),
(5, 'Harry Potter 2', 'Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad.', 35.77, 16, '<img src=\"imgarticulos/harrypoter2.jpg\">', 89, 'Novela', 'Tapa dura', 'Salamanca', '2002', b'0', 'J.K. Rowling'),
(6, 'Watchmen', 'Watchmen transcurre en un universo paralelo, en plena Guerra Fría entre Estados Unidos y la Unión Soviética, donde los superhéroes han sido ilegalizados por el gobierno. Cuando uno de esos antiguos héroes es asesinado en su apartamento por un misterioso individuo, Rorschach, el último héroe activo al margen de la ley, comienza a investigar lo que cree que es un golpe encubierto contra sus antiguos compañeros (los Watchmen), e inicia una búsqueda para reunirlos a todos y advertirles de sus sospechas.\r\n', 85.55, 18, '<img src=\"imgarticulos/wathcmen.jpg\">', 27, 'Comic', 'Tapa blanda', 'DC Comics', '1986', b'0', 'Alan Moore'),
(7, 'Patria', 'El día en que ETA anuncia el abandono de las armas, Bittori se dirige al cementerio para contarle a la tumba de su marido el Txato, asesinado por los terroristas, que ha decidido volver a la casa donde vivieron. ¿Podrá convivir con quien...', 22.9, 20, '<img src=\"imgarticulos/patria.jpg\">', 10, 'Libro de texto', 'Tapa blanda', 'Tusquets Editores', '2010', b'0', 'Aramburu Irigoyen, Fernando'),
(8, 'Memoria del comunismo', 'Cien años y cien millones de muertos después, ¿por qué el comunismo sigue siendo una ideología respetada? Buceando en las fuentes originales -de Marx, Bakunin y Lenin al Che o Pablo Iglesias- este libro explica la naturaleza real del c...', 29.9, 20, '<img src=\"imgarticulos/comunismo.jpg\">', 10, 'Novela', 'Tapa blanda', 'La esfera de los libros', '2004', b'0', 'Jiménez Losantos, Federico'),
(9, 'El día que se perdió el amor', 'Después del éxito arrollador de El día que se perdió la cordura, con más de 100.000 ejemplares vendidos y una gran acogida internacional, Javier Castillo regresa con una nueva novela que explora los límites del amor.«A veces el amor te ...', 17.9, 18, '<img src=\"imgarticulos/amor.jpg\">', 6, 'Libro de texto', 'Tapa blanda', 'SUMA', '2003', b'0', 'Javier Castillo'),
(10, 'El fuego invisible', 'David Salas, un prometedor lingüista del Trinity Collage de Dublín, se encuentra, después de aterrizar en Madrid para pasar sus vacaciones, con Victoria Goodman, una vieja amiga de sus abuelos y con su joven ayudante, una misteriosa hist...', 21.9, 20, '<img src=\"imgarticulos/fuego.jpg\">', 3, 'Ensayo', 'Tapa dura', 'Editorial Planeta', '2010', b'0', 'Sierra, Javier'),
(11, 'La transparencia del tiempo', 'A un Mario Conde a punto de cumplir sesenta años, y que se siente más en crisis y más escéptico que de costumbre con su país, le llega de manera inesperada un encargo de un antiguo amigo del instituto, Bobby, que le pide ayuda para recup...', 19.9, 20, '<img src=\"imgarticulos/transparencia.jpg\">', 10, 'Comic', 'Tapa blanda', 'Tusquets Editores', '2008', b'0', 'Padura, Leonardo'),
(12, 'Ordesa', 'ESTE LIBRO TE PERTENECEOrdesa: el libro más personal de Manuel Vilas«Son dos verdades distintas, pero las dos son verdades: la del libro y la de la vida. Y juntas fundan una mentira.»En Ordesa, Manuel Vilas narra una historia personal co...', 18.9, 19, '<img src=\"imgarticulos/ordesa.jpg\">', 1, 'Ensayo', 'Tapa blanda', 'ALFAGUARA', '2008', b'0', 'Manuel Vilas'),
(13, 'Evangelio 2018', 'Como cada año y desde hace más de 20 años, Editorial Edibesa pone a disposición de los lectores su ya clásico Evangelio para cada día del año. Un libro que nos permite seguir la misa diaria, tener las principales oraciones del cristiano,...', 1.9, 20, '<img src=\"imgarticulos/evangelio.jpg\">', 2, 'Libro de texto', 'Tapa dura', 'EDIBESA', '2008', b'0', 'Martínez Puche, José Antonio'),
(14, 'Idiotizadas', 'Moderna de pueblo ha crecido escuchando frases como «eso no es propio de una señorita», «esa es una guarra» o «el día de tu boda será el más feliz de tu vida». Pero después de mudarse a la ciudad y conocer a Zorricienta, Gordinieves y la...', 14.9, 20, '<img src=\"imgarticulos/idiotizadas.jpg\">', 0, 'Ensayo', 'Tapa blanda', 'Zenith', '2005', b'0', 'Moderna de pueblo'),
(15, 'El principito', 'Viví así, solo, sin nadie con quien hablar verdaderamente, hasta que tuve una avería en el desierto del Sahara, hace seis años. Algo se había roto en mi motor. Y como no tenía conmigo ni mecánico ni pasajeros, me dispuse a realizar, solo...', 5.95, 20, '<img src=\"imgarticulos/principito.jpg\">', 10, 'Novela', 'Tapa blanda', 'PUBLICACIONES Y EDICIONES SALAMANDRA', '2010', b'0', 'Saint-Exupéry, Antoine de'),
(16, 'El legado de los espías', 'Peter Guillam, leal colega y discípulo de George Smiley en los servicios secretos británicos ?conocidos como El Circo?, disfruta de su jubilación en la finca familiar de la costa meridional de Bretaña, cuando una carta de su antigua orga...', 21.5, 19, '<img src=\"imgarticulos/espias.jpg\">', 5, 'Novela', 'Tapa blanda', 'Editorial Planeta', '2008', b'0', 'le Carré, John');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`) VALUES
('Danielprz21', 'Maloso21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

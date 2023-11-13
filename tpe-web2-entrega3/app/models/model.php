<?php
    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END

                --
                -- Estructura de tabla para la tabla `bebidas`
                --
                
                CREATE TABLE `bebidas` (
                  `id` int(11) NOT NULL,
                  `nombre` varchar(255) NOT NULL,
                  `tipo` varchar(50) NOT NULL,
                  `precio` decimal(8,2) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `bebidas`
                --
                
                INSERT INTO `bebidas` (`id`, `nombre`, `tipo`, `precio`) VALUES
                (1, 'black label', 'whisky', 20000.00),
                (2, 'gold label', 'whisky', 40000.00),
                (3, 'blue label', 'whisky', 200000.00),
                (4, 'swing escoces', 'whisky', 45000.00),
                (5, 'redd label', 'whisky', 17000.00),
                (6, 'old parr', 'whisky', 15000.00),
                (7, 'jack daniels', 'whisky', 24000.00);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `cliente`
                --
                
                CREATE TABLE `cliente` (
                  `id` int(11) NOT NULL,
                  `usuario` varchar(255) NOT NULL,
                  `password` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `cliente`
                --
                
                INSERT INTO `cliente` (`id`, `usuario`, `password`) VALUES
                (1, 'tito@gmail.com', '1234]'),
                (2, 'webadmin', '$2y$10$101/HDKItM7Zn.rIvRm.Bu5uFAbEQ6isgzCIsM8hYJYCbgSKBOthu');
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `pedidos`
                --
                
                CREATE TABLE `pedidos` (
                  `id` int(11) NOT NULL,
                  `cliente_id` int(11) DEFAULT NULL,
                  `bebida_id` int(11) DEFAULT NULL,
                  `cantidad` int(1) NOT NULL,
                  `fecha_pedido` date NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Índices para tablas volcadas
                --
                
                --
                -- Indices de la tabla `bebidas`
                --
                ALTER TABLE `bebidas`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indices de la tabla `cliente`
                --
                ALTER TABLE `cliente`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indices de la tabla `pedidos`
                --
                ALTER TABLE `pedidos`
                  ADD PRIMARY KEY (`id`),
                  ADD KEY `bebida_id` (`bebida_id`),
                  ADD KEY `cliente_id` (`cliente_id`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --
                
                --
                -- AUTO_INCREMENT de la tabla `bebidas`
                --
                ALTER TABLE `bebidas`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
                
                --
                -- AUTO_INCREMENT de la tabla `cliente`
                --
                ALTER TABLE `cliente`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                
                --
                -- AUTO_INCREMENT de la tabla `pedidos`
                --
                ALTER TABLE `pedidos`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- Restricciones para tablas volcadas
                --
                
                --
                -- Filtros para la tabla `pedidos`
                --
                ALTER TABLE `pedidos`
                  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`bebida_id`) REFERENCES `bebidas` (`id`),
                  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
                COMMIT;

                END;
                $this->db->query($sql);
            }
            
        }
    }
                          
<?php
/**
 * Plantilla Footer
 * Documentación:
 * https://developer.wordpress.org/reference/functions/wp_footer/
 */
?>
<!-- Empieza el footer-->
 <footer>
    <!-- Empieza el contenido -->
    <div class="footer-container">
        <!-- Columna 1 -->
        <div class="footer-col">
            <h3>Coordinación de Igualdad de Género</h3>
            <p>Trabajamos para construir una universidad libre de violencia y discriminación, donde todas las personas tengan las mismas oportunidades de desarrollo.</p>
            <div class="social-links">
                <a href="#" aria-label="Facebook de la CIGU"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                <a href="#" aria-label="X (Twitter) de la CIGU"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
                <a href="#" aria-label="Instagram de la CIGU"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                <a href="#" aria-label="YouTube de la CIGU"><i class="fab fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>
        <!--Columna 2-->
        <div class="footer-col">
            <h3>Enlaces Rápidos</h3>
            <ul>
                <li><a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i> Conoce la CIGU</a></li>
                <li><a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i> Cursos</a></li>
                <li><a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i> Actividades</a></li>
                <li><a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i> Recursos</a></li>
                <li><a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i> Contacto</a></li>
            </ul>
        </div>
        <!-- Columna 3 -->
        <div class="footer-col">
                <h3>Contacto</h3>
                <div class="contact-info">
                    <div><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <span>Piso 10 de la Torre de Rectoría UNAM</span></div>
                    <div><i class="fas fa-phone" aria-hidden="true"></i> <span>(55) 5622-0000 ext. 1234</span></div>
                    <div><i class="fas fa-envelope" aria-hidden="true"></i> <span>igualdaddegenero@unam.mx</span></div>
                    <div><i class="fas fa-clock" aria-hidden="true"></i> <span>Lunes a Viernes: 9:00 - 18:00 hrs</span></div>
                </div>
            </div>
        </div>
    </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> Coordinación de Igualdad de Género - UNAM. Todos los derechos reservados.</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
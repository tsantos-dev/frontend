    <footer>
        <div class="footer-bar"></div>
        <div class="footer-nav">
            <div class="container rodape">
                <menu>
                <?php wp_nav_menu( 'footer_menu' ) ?>
                </menu>
                <div class="parceiros">
                    <h3>Parceiros</h3>
                    <div class="marcas">
                        <figure class="quantum"><img src="<?php echo get_template_directory_uri(); ?>/images/marca_quantum.png" alt="marca Quantum Lab"></figure>
                        <figure class="sed"><img src="<?php echo get_template_directory_uri(); ?>/images/marca_sedms.webp" alt="marca da Secretaria de Educação do Mato Grosso do Sul"></figure>
                        <figure class="fundect"><img src="<?php echo get_template_directory_uri(); ?>/images/marca_fundect.png" alt="marca da Fundect"></figure>
                        <figure class="pictec"><img src="<?php echo get_template_directory_uri(); ?>/images/marca_pictec.jpg" alt="marca do Pictec"></figure>

                    </div>
                </div>
                <div class="newsletter">
                    <h3>Quer saber mais sobre o projeto? Assine nossa newsletter e fique por dentro.</h3>
                    <iframe data-skip-lazy="" src="https://douradosempatrimonio.ipzmarketing.com/f/n_WZZLpBcDU" frameborder="0" scrolling="no" width="100%" class="ipz-iframe"></iframe>
                    <script data-cfasync="false" type="text/javascript" src="https://assets.ipzmarketing.com/assets/signup_form/iframe_v1.js"></script>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
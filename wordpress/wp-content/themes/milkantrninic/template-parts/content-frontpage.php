<?php
/**
 * Template part for displaying frontpage tml
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MilkanTrninic
 */

?>
<main class="mainsection">
    <section class="firstsection">

        <article  class="articleschedule">
            <p><span style="    
                background: hsl(230, 29%, 20%);
                color: white;
                padding: 4.5px 11px;
                border-radius: 13px;
                font-weight: 700;
                font-size: 14px;
                letter-spacing: 1px;

            ">New</span>&nbsp;&nbsp;monograph dashboard</p>
            <h1>Powerful insights into your team</h1>
            <p class="lastp">Project planning and time tracking for agile teams</p>
            <?php echo do_shortcode('[sample-shortcode]'); ?>
        </article>
        <article  class="articlepicture">
            <div class="greybcg"></div>
            <img src="<?php echo IMG_DIR;?>illustration-devices.svg" alt="">
           

        </article>

    </section>

</main>

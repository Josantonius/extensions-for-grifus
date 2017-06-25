<?php
/**
 * Extensions For Grifus WordPress plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Extensions-For-Grifus.git
 * @since      1.0.0
 */

use Eliasis\App\App,
    Eliasis\View\View;

$modules = View::get();
?>

<div class="jst-install-error error notice no-display">
    <p><strong><span class="jst-error-msg"></span></strong></p>
</div>

<div class="mdl-cell mdl-cell--12-col mdl-grid mdl-grid--no-spacing-off">

    <?php foreach($modules as $module): ?>

        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-phone ">

            <div class="mdl-card__title mdl-card--expand mdl-color--blue-200" style="background: url(<?= $module['image'] ?>) center / cover;"></div>
            <div class="jst-card--border"></div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                
                <h2 class="mdl-card__title-text card-title">
                    <?= $module['name'] ?>
                </h2><br>
                <?= __($module['description'], 'extensions-for-grifus') ?>
                
                <div class="mdl-list__item">
                   <div class="custom-fields">
                        <div class="module-state-btn">
                            <button id="<?= $module['id'] ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mod-btn module-btn module-btn-<?= $module['state'] ?>" data-state="<?= $module['state'] ?>">
                                <?= $module['stateText'] ?>
                            </button>
                            <button id="<?= $module['id'] ?>-rmv" data-id="<?= $module['id'] ?>" <?= $module['show-uninstall-button'] ?> class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mod-btn mdl-button--accent module-btn-uninstall" data-state="uninstall">
                                <?= __('Uninstall', 'extensions-for-grifus') ?>
                            </button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    


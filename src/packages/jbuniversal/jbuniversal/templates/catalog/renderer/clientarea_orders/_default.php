<?php
/**
 * JBZoo Application
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Application
 * @license    GPL-2.0
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @link       https://github.com/JBZoo/JBZoo
 * @author     Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$this->app->jbassets->less('jbassets:less/cart/clientarea.less');

$this->app->document->setTitle(JText::_('JBZOO_CLIENTAREA_ORDERS_TITLE'));

echo $this->partial('clientarea_orders', 'default.styles');
?>

<div class="jbclientarea">

    <p class="jbclientarea-page-desc"><?php echo JText::_('JBZOO_CLIENTAREA_DESCRIPTION'); ?>:</p>

    <?php if (!empty($vars['objects'])) : ?>

        <table class="jbclientarea-orderlist">
            <thead>
            <tr>
                <th><?php echo JText::_('JBZOO_CLIENTAREA_ID'); ?></th>
                <th><?php echo JText::_('JBZOO_CLIENTAREA_DATE'); ?></th>
                <th><?php echo JText::_('JBZOO_CLIENTAREA_PRICE'); ?></th>
                <th><?php echo JText::_('JBZOO_CLIENTAREA_STATUS'); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            $i = 0;
            foreach ($vars['objects'] as $order) :
                $i++;
                $created   = $this->app->jbdate->toHuman($order->created);
                $orderName = '<a href="' . $order->getUrl() . '">' . $order->getName('full') . '</a>';
                $rowClass  = ($i % 2 == 0) ? 'even' : 'odd';
                ?>

                <tr class="jbclientarea-order jbclientarea-order-<?php echo $order->id; ?> row-<?php echo $rowClass; ?>">
                    <td class="jbclientarea-name"><p><?php echo $orderName; ?></p></td>
                    <td class="jbclientarea-date"><p><?php echo $created; ?></p></td>
                    <td class="jbclientarea-price"><p><?php echo $order->getTotalSum(); ?></p></td>
                    <td class="jbclientarea-status"><p><?php echo $order->getStatus()->getName();?></p></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p class="jbclientarea-empty"><?php echo JText::_('JBZOO_CLIENTAREA_EMPTY'); ?></p>
    <?php endif; ?>

</div>

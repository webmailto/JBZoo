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

$graphRows = JBModelOrder::model()->countByDate();

?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1.1", {packages: ["calendar"]});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn({type: 'date', id: 'date'});
        dataTable.addColumn({type: 'number', id: 'sales'});
        dataTable.addRows([
            <?php foreach($graphRows as $row) : ?>
            [new Date(<?php echo $row->year;?>, <?php echo $row->month - 1;?>, <?php echo $row->day;?>),
                <?php echo $row->count;?>],
            <?php endforeach;?>
        ]);

        var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

        var options = {
            title   : "<?php echo JText::_('JBZOO_ADMIN_INDEX_GRAPH_TITLE'); ?>",
            calendar: {
                daysOfWeek: 'ВПВСЧПС'
            }

        };

        chart.draw(dataTable, options);
    }
</script>
<div id="calendar_basic"></div>
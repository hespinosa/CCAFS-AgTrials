<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
    <?php if (!$pager->getNbResults()): ?>
        <table>
            <caption class="fg-toolbar ui-widget-header ui-corner-top">
                <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
                    <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left"><?php echo UIHelper::addIconByConf('filters') . __('Filters', array(), 'sf_admin') ?></a>
                <?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), 'tbvariety_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right')) ?>
                <a href="/tbvariety/new" class="fg-button ui-state-default fg-button-icon-left ui-corner-all" tabindex="-1"><span class="ui-icon ui-icon-plus"></span>New</a>
                <a href="/checkvariety" class="fg-button ui-state-default ui-corner-all" tabindex="-1"><img width="12" height="12" src="/images/Ok-icon.png"> Check</a>
                <a href="/tbvariety/Downloadlistvariety/" class="fg-button ui-state-default fg-button-icon-left ui-corner-all" tabindex="-1"><span></span><?php echo image_tag('excel-icon.png', array('size' => '15x15')); ?> Download Excel</a>
            </div>
            <h1><span class="ui-icon ui-icon-triangle-1-s"></span> <?php echo __('List Variety/Race', array(), 'messages') ?></h1>
        </caption>
        <tbody>
            <tr class="sf_admin_row ui-widget-content">
                <td align="center" height="30">
                    <p align="center"><?php echo __('No result', array(), 'sf_admin') ?></p>
                </td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
                    <table>
                        <caption class="fg-toolbar ui-widget-header ui-corner-top">
                            <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
                                <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left"><?php echo UIHelper::addIconByConf('filters') . __('Filters', array(), 'sf_admin') ?></a>
                <?php $isDisabledResetButton = ($hasFilters->getRawValue()) ? '' : ' ui-state-disabled' ?>
                <?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), 'tbvariety_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right' . $isDisabledResetButton)) ?>
                    <a href="/tbvariety/new" class="fg-button ui-state-default fg-button-icon-left ui-corner-all" tabindex="-1"><span class="ui-icon ui-icon-plus"></span>New</a>
                    <a href="/checkvariety" class="fg-button ui-state-default ui-corner-all" tabindex="-1"><img width="12" height="12" src="/images/Ok-icon.png"> Check</a>
                    <a href="/tbvariety/Downloadlistvariety/" class="fg-button ui-state-default fg-button-icon-left ui-corner-all" tabindex="-1"><span></span><?php echo image_tag('excel-icon.png', array('size' => '15x15')); ?> Download Excel</a>
                </div>
                <h1><span class="ui-icon ui-icon-triangle-1-s"></span> <?php echo __('List Variety/Race', array(), 'messages') ?></h1>
            </caption>

            <thead class="ui-widget-header">
                <tr>
                <?php include_partial('tbvariety/list_th_tabular', array('sort' => $sort)) ?>
                    <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Actions', array(), 'sf_admin') ?></th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th colspan="9">
                        <div class="ui-state-default ui-th-column ui-corner-bottom">
                        <?php include_partial('tbvariety/pagination', array('pager' => $pager)) ?>
                    </div>
                </th>
            </tr>
        </tfoot>

        <tbody>
            <?php foreach ($pager->getResults() as $i => $tbvariety): $odd = fmod(++$i, 2) ? ' odd' : '' ?>
                            <tr class="sf_admin_row ui-widget-content <?php echo $odd ?>">
                <?php include_partial('tbvariety/list_td_tabular', array('tbvariety' => $tbvariety)) ?>
                <?php include_partial('tbvariety/list_td_actions', array('tbvariety' => $tbvariety, 'helper' => $helper)) ?>
                        </tr>
            <?php endforeach; ?>
                        </tbody>
                    </table>
    <?php endif; ?>
</div>

<script type="text/javascript">
    function checkAll(){
        var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
    }
</script>

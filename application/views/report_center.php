<div class="content-wrapper">
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Financial Stats</h4>
                        </div>
                        <div class="card-body collapse show">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card gradient-red-ocean" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['net_expense'])?>
                                                            </h3>
                                                            <span>Total Expense</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card gradient-indigo-dark-blue" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['net_income'])?>
                                                            </h3>
                                                            <span>Total Income</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card gradient-red-ocean" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['payable'])?>
                                                            </h3>
                                                            <span>Accounts Payable</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card gradient-indigo-dark-blue" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['receivable'])?>
                                                            </h3>
                                                            <span>Accounts Receivable</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card gradient-red-ocean" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['new_office_making'])?>
                                                            </h3>
                                                            <span>Office Making</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card gradient-red-ocean" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['upgrades'])?>
                                                            </h3>
                                                            <span>Upgrades</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card gradient-red-ocean" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['developmnet_cost'])?>
                                                            </h3>
                                                            <span>Total Development</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card gradient-indigo-dark-blue" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($stats['net_profit'])?>
                                                            </h3>
                                                            <span>Net Profit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

            <section id="row-selection">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body collapse show">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <canvas id="incomeChart" width="400" height="200"></canvas>
                                            <script>
                                                jQuery(document).ready(function() {
        
                                                    var labels = [];
                                                    var amount = [];
                                                    var colors = [];
                                                    <? foreach ($income_chart["data"] as $key => $value) { ?>
                                                        labels.push('<?=$value['category_name']?>');
                                                        amount.push(<?=$value['amount']?>);
                                                        colors.push('<?=$value['color']?>');
                                                    <? } ?>
        
                                                    var ctx = document.getElementById("incomeChart").getContext('2d');
                                                    var myChart = new Chart(ctx, {
                                                        type: 'pie',
                                                        data: {
                                                            labels: labels,
                                                            datasets: [{
                                                                label: 'Income Chart',
                                                                data: amount,
                                                                backgroundColor: colors
                                                            }]
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>

                                        <div class="col-md-6">
                                            <canvas id="expenseChart" width="400" height="200"></canvas>
                                            <script>
                                                jQuery(document).ready(function() {
        
                                                    var labels = [];
                                                    var amount = [];
                                                    var colors = [];
                                                    <? foreach ($expense_chart["data"] as $key => $value) { ?>
                                                        labels.push('<?=$value['category_name']?>');
                                                        amount.push(<?=$value['amount']?>);
                                                        colors.push('<?=$value['color']?>');
                                                    <? } ?>
        
                                                    var ctx = document.getElementById("expenseChart").getContext('2d');
                                                    var myChart = new Chart(ctx, {
                                                        type: 'pie',
                                                        data: {
                                                            labels: labels,
                                                            datasets: [{
                                                                label: 'Expense Chart',
                                                                data: amount,
                                                                backgroundColor: colors
                                                            }]
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Financial Stats</h4>
                        </div>
                        <div class="card-body collapse show">
                            <div class="card-block">
                                <table class="">
                                    <tbody>
                                        <tr>
                                            <td>Opening Receivable</td>
                                            <td><?=number_format($stats['opening_receivable'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Opening Payable</td>
                                            <td><?=number_format($stats['opening_payable'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Payable Received</td>
                                            <td><?=number_format($stats['total_income_payable'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Payable Paid</td>
                                            <td><?=number_format($stats['total_expense_payable'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Pending Invoice Amount</td>
                                            <td><?=number_format($stats['unpaid_invoice'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Running Cost (Nov 2019 onwards)</td>
                                            <td><?=number_format($stats['running_cost'])?></td>
                                        </tr>
                                        <tr>
                                            <td>New Office Making (Nov 2019 onwards</td>
                                            <td><?=number_format($stats['new_office_making'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Upgrades (Nov 2019 onwards</td>
                                            <td><?=number_format($stats['upgrades'])?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

</div>
        
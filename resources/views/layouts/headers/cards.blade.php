<div class="header bg-black pb-9  pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <!-- Card vendas -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Vendas</h5>
                                    <?php
                                        $vendas = DB::Table('vendas')
                                        ->select("VEN_ID")
                                        ->where("USU_ID" , DB::raw(auth()->user()->id))
                                        ->get();
                                        $numeroVendas = $vendas->count();
                                       echo "<span class=\"h2 font-weight-bold mb-0\">$numeroVendas</span>" 
                                    ?>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <!-- Card Valor -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Valor vendido (R$)</h5>
                                    <?php
                                        $vendas = DB::Table('vendas')
                                        ->select(DB::raw('sum(VEN_VALOR) as valor'))
                                        ->where("USU_ID" , auth()->user()->id)
                                        ->get();

                                        foreach($vendas as $ln){
                                            $valor = number_format($ln->valor, 2, ',', '.');
                                            
                                            echo "<span class=\"h2 font-weight-bold mb-0\">$valor</span>"; 
                                        }
                                    ?>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class= "row" style="margin-top: 30px">
                <!-- Card instrumentos -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Produto mais vendido</h5>
                                    <?php
                                        $vendas = DB::Table('vendas')
                                        ->select(DB::raw('PRO_ID, sum(VEN_QTDE_VENDIDA) as qtde'))
                                        ->where("USU_ID" , auth()->user()->id)
                                        ->groupBy("PRO_ID")
                                        ->orderBy("qtde", "desc")
                                        ->limit(1)
                                        ->get();

                                        foreach($vendas as $venda){
                                            $produto = DB::Table('produtos')
                                            ->select('PRO_NOME')
                                            ->where("PRO_ID" , $venda->PRO_ID)
                                            ->get();
                                        }
                                        
                                        foreach($produto as $ln){
                                            echo "<span class=\"h2 font-weight-bold mb-0\">$ln->PRO_NOME</span>"; 
                                        }
                                    ?>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-drum"></i>
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
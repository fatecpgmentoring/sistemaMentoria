<!-- <aside>
	<p>sidebar</p>
</aside> -->
<aside id="aside-nav">
    <ul class="icon-list">
        <li><div class="wrap"><span class="spriting sprite-nav-dashboard"></span></div></li>
        <li><div class="wrap"><span class="spriting sprite-nav-atendimento"></span></div></li>
        <li><div class="wrap"><span class="spriting sprite-nav-credito"></span></div></li>
        <li><div class="wrap"><span class="spriting sprite-nav-conta"></span></div></li>
    </ul>
    <nav class="nav-list">
        <li>
            <div class="wrap-item">
                <h5>Menu</h5>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="wrap-item">
                <h5>Atendimento</h5>
                <ul>
                    <li><a href="#">Relatórios</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="wrap-item">
                <h5>Créditos <br> Transferências</h5>
                <ul>
                    <li><a href="#">Relatórios</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="wrap-item">
                <h5>Minha Conta</h5>
                <ul>
                    <li><a href="/painel-consultor/minha-conta/alterar-senha">Alterar senha</a></li>
                    <li><a href="/painel-consultor/minha-conta/alterar-cadastro">Alterar cadastro</a></li>
                    <li><form action="" id="flogout" method="Post">
                        <!--@csrf -->
                        <!-- <a href="javascript:{}" onclick="document.getElementById('flogout').submit(); return false;">Sair-->
                        <a href="#">Sair</a>
                    </form></li>
                </ul>
            </div>
        </li>
    </nav>
</aside>
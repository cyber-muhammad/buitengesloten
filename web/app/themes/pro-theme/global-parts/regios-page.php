<section class="slotenmaker-regions-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Regio's</h2>
                <p class="section-subtitle">Onze erkende en betrouwbare slotenmakers zijn altijd binnen 20-30 minuten ter plaatse om uw deur te openen.</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Antwerpen Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card">
                    <div class="province-header" onclick="toggleProvinceContent('antwerpen')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">Antwerpen</h3>
                        <span class="province-toggle active" id="toggle-antwerpen">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-antwerpen">
                        <div class="province-body">
                            <p class="municipality-title">DEELGEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // Antwerpen deelgemeenten
                                $antwerpen_deelgemeenten = array(
                                    'Berendrecht', 'Zandvliet', 'Lillo', 'Deurne', 'Borgerhout', 'Merksem', 'Ekeren',
                                    'Berchem', 'Hoboken', 'Wilrijk', 'Olmen', 'Vlimmeren', 'Gestel', 'Vremde',
                                    'Rijmenam', 'Weert', 'Mariekerke', 'Hingene', 'Sint-Job-in-\'t-Goor',
                                    'Sint-Lenaarts', 'Bouwel', 'Hallaar', 'Booischot', 'Itegem', 'Wiekevorst', 'Schriek'
                                );

                                foreach ($antwerpen_deelgemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vlaams-Brabant Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card">
                    <div class="province-header" onclick="toggleProvinceContent('vlaams-brabant')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">Vlaams-Brabant</h3>
                        <span class="province-toggle active" id="toggle-vlaams-brabant">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-vlaams-brabant">
                        <div class="province-body">
                            <p class="municipality-title">DEELGEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // Vlaams-Brabant deelgemeenten
                                $vlaams_brabant_deelgemeenten = array(
                                    'Gelrode', 'Langdorp', 'Rillaar', 'Essene', 'Hekelgem', 'Teralfene', 'Bekkerzeel',
                                    'Kobbegem', 'Mollem', 'Relegem', 'Zellik', 'Lot', 'Alsemberg', 'Dworp',
                                    'Huizingen', 'Betekom', 'Assent', 'Molenbeek-Wersbeek', 'Korbeek-Dijle',
                                    'Leefdaal', 'Korbeek-Lo', 'Lovenjoel', 'Opvelp', 'Hever', 'Kerkom', 'Neervelp'
                                );

                                foreach ($vlaams_brabant_deelgemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- West-Vlaanderen Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card">
                    <div class="province-header" onclick="toggleProvinceContent('west-vlaanderen')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">West-Vlaanderen</h3>
                        <span class="province-toggle active" id="toggle-west-vlaanderen">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-west-vlaanderen">
                        <div class="province-body">
                            <p class="municipality-title">DEELGEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // West-Vlaanderen deelgemeenten
                                $west_vlaanderen_deelgemeenten = array(
                                    'Hoogstade', 'Oeren', 'Sint-Rijkers', 'Gijverinkhove', 'Izenberge', 'Leisele',
                                    'Stavele', 'Gijzelbrechteqem', 'Ingooigem', 'Vichte', 'Kaster', 'Tiegem',
                                    'Koolskamp', 'Kerkhove', 'Waarmaarce', 'Outrijve', 'Bossuit', 'Oedelem',
                                    'Sint-Joris', 'Uitkerke', 'Koolkerke', 'Sint-Andries', 'Sint-Michiels', 'Assebroek'
                                );

                                foreach ($west_vlaanderen_deelgemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Limburg Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card">
                    <div class="province-header" onclick="toggleProvinceContent('limburg')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">Limburg</h3>
                        <span class="province-toggle active" id="toggle-limburg">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-limburg">
                        <div class="province-body">
                            <p class="municipality-title">DEELGEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // Limburg deelgemeenten
                                $limburg_deelgemeenten = array(
                                    'Niel-bij-As', 'Beverlo', 'Koersel', 'Paal', 'Beverst', 'Eigenbilzen', 'Grote-Spouwen',
                                    'Hees', 'Kleine-Spouwen', 'Mopertingen', 'Munsterbilzen', 'Rijkhoven',
                                    'Rosmeer', 'Waltwilder', 'Martenslinde', 'Hoelbeek', 'Kaulille', 'Reppel',
                                    'Bommershoven', 'Broekom', 'Gors-Opleeuw', 'Gotem', 'Groot-Loon'
                                );

                                foreach ($limburg_deelgemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Oost-Vlaanderen Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card">
                    <div class="province-header" onclick="toggleProvinceContent('oost-vlaanderen')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">Oost-Vlaanderen</h3>
                        <span class="province-toggle active" id="toggle-oost-vlaanderen">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-oost-vlaanderen">
                        <div class="province-body">
                            <p class="municipality-title">DEELGEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // Oost-Vlaanderen deelgemeenten
                                $oost_vlaanderen_deelgemeenten = array(
                                    'Gijzegem', 'Hofstade', 'Baardegem', 'Herdersem', 'Meldert', 'Moorsel',
                                    'Erembodegem', 'Nieuwerkerken', 'Bellem', 'Knesselaare', 'Lotenhulle', 'Poeke',
                                    'Ursel', 'Boekhoute', 'Bassevelde', 'Oosteeklo', 'Overmere', 'Uitbergen',
                                    'Haasdork', 'Melsele', 'Vrasene', 'Kallo', 'Doel', 'Kieldrecht', 'Verrebroek', 'Elst'
                                );

                                foreach ($oost_vlaanderen_deelgemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Brussel Province -->
            <div class="col-lg-6 col-12 mb-5">
                <div class="province-card active">
                    <div class="province-header" onclick="toggleProvinceContent('brussel')">
                        <div class="province-divider"></div>
                        <p class="province-label">Provincie</p>
                        <h3 class="province-name">Brussel</h3>
                        <span class="province-toggle active" id="toggle-brussel">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="province-content" id="content-brussel">
                        <div class="province-body">
                            <p class="municipality-title">GEMEENTEN:</p>
                            <div class="municipality-list">
                                <?php
                                // Brussel gemeenten
                                $brussel_gemeenten = array(
                                    'Elsene', 'Etterbeek', 'Evere', 'Ganshoren', 'Oudergem', 'Sint-Agatha-Berchem',
                                    'Sint-Gillis', 'Sint-Jans-Molenbeek', 'Sint-Joost-Ten-Node',
                                    'Sint-Lambrechts-Woluwe', 'Sint-Pieters-Woluwe', 'Ukkel', 'Vorst',
                                    'Watermaal-Bosvoorde'
                                );

                                foreach ($brussel_gemeenten as $gemeente) {
                                    echo '<a href="/slotenmaker-' . sanitize_title($gemeente) . '">' . $gemeente . '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
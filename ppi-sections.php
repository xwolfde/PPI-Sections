<?php
/**
 * Plugin Name: PPI Sections
 * Description: This plugin displays a list of sections and subsctions of pirate parties international and syncs them against a defined index    
 * Author: Wolfgang Wiese
 * Author URI: http://www.xwolf.de/
 * Plugin URI: http://www.ppi_sections.de/plugins/ppi-sections
 * Version: 1.0
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,
 * MA 02110-1301 USA
 */

/**
 * Define defaults
 */
define("PPI_SECTIONS_INDEX_URL", "http://xwolf.loc/ppi-sections.txt");
define("PPI_SECTIONS_UPDATE_DELTA", 432000);
define("PPI_SECTIONS_INDEXKEY", 'International (with flags)');

/*
 * default links for pirate party worldwide and in germany
 */

 $ppi_sections_fallbackindex = array(
     __( 'Germany', 'ppi_sections' )  => array(
        'title' => __( 'Pirate Party Germany', 'ppi_sections' ),
        'url'   => 'https://www.piratenpartei.de',
        'sublist'   => array(
            __('Baden-W&uuml;rttemberg', 'ppi_sections' ) => 'https://piratenpartei-bw.de/',
            __('Bayern', 'ppi_sections' ) => 'https://piratenpartei-bayern.de/',
            __('Berlin', 'ppi_sections' ) => 'http://berlin.piratenpartei.de/',
            __('Brandenburg', 'ppi_sections' ) => 'https://www.piratenbrandenburg.de/',
            __('Bremen', 'ppi_sections' ) => 'http://bremen.piratenpartei.de/',
            __('Hamburg', 'ppi_sections' ) => 'http://www.piratenpartei-hamburg.de/',
            __('Hessen', 'ppi_sections' ) => 'https://www.piratenpartei-hessen.de/',
            __('Mecklenburg-Vorpommern', 'ppi_sections' ) => 'http://www.piratenpartei-mv.de/',
            __('Niedersachsen', 'ppi_sections' ) => 'https://www.piraten-nds.de/',
            __('Nordrhein-Westfalen', 'ppi_sections' ) => 'http://www.piratenpartei-nrw.de/',
            __('Rheinland-Pfalz', 'ppi_sections' ) => 'http://www.piraten-rlp.de/',
            __('Saarland', 'ppi_sections' ) => 'https://piratenpartei-saarland.de/',
            __('Sachsen', 'ppi_sections' ) => 'http://www.piraten-sachsen.de/',
            __('Sachsen-Anhalt', 'ppi_sections' ) => 'https://www.piraten-lsa.de/',
            __('Schleswig-Holstein', 'ppi_sections' ) => 'https://landesportal.piratenpartei-sh.de/',
            __('Th&uuml;ringen', 'ppi_sections' ) => 'http://www.piraten-thueringen.de/'
        )
     ),
     __('International', 'ppi_sections' ) => array(
         'title' => __('Pirate Party International', 'ppi_sections' ),
         'url'  => 'http://www.pp-international.net/',
         'sublist' => array(
             __('Australia', 'ppi_sections' ) => 'http://pirateparty.org.au/',
             __('Austria', 'ppi_sections' ) => 'http://piratenpartei.at/',
             __('Argentina', 'ppi_sections' ) => 'http://www.partidopirata.com.ar/',
             __('Belarus', 'ppi_sections' ) => 'http://pirates.by/',            
             __('Beligium', 'ppi_sections' ) => 'https://pirateparty.be/',
             __('Brazil', 'ppi_sections' ) => 'http://www.partidopirata.org/',
             __('Canada', 'ppi_sections' ) => 'http://www.piratepartyofcanada.com/',
             __('Chile', 'ppi_sections' ) => 'http://www.partidopirata.cl/',
             __('Columbia', 'ppi_sections' ) => 'http://pp.interlecto.net/',
             __('Croatia', 'ppi_sections' ) => 'https://pirati.hr/',
             __('Cyprus', 'ppi_sections' ) => 'http://www.piratepartycyprus.com/',
             __('Czech Republic', 'ppi_sections' ) => 'http://www.ceskapiratskastrana.cz/',
             __('Denmark', 'ppi_sections' ) => 'http://piratpartiet.dk/',
             __('Estonia', 'ppi_sections' ) => 'http://piraadipartei.ee/',
             __('Finland', 'ppi_sections' ) => 'https://piraattipuolue.fi/',
             __('France', 'ppi_sections' ) => 'https://partipirate.org/',
             __('Germany', 'ppi_sections' ) => 'https://www.piratenpartei.de/', 
             __('Greece', 'ppi_sections' ) => 'https://pirateparty.gr/',
             __('Guatemala', 'ppi_sections' ) => 'http://partidopirata.org.gt/',
             __('Hungary', 'ppi_sections' ) => 'http://kalozpart.org/',
             __('Iceland', 'ppi_sections') => 'http://pirateparty.is/',
             __('Israel', 'ppi_sections') => 'http://piratim.org/',
             __('Italy', 'ppi_sections' ) => 'http://www.partito-pirata.it/',
             __('Kazakhstan', 'ppi_sections' ) => 'http://pirateparty.kz/',
             __('Korea, South', 'ppi_sections' ) => 'http://pirateparty.kr/',
             __('Latvia', 'ppi_sections' ) => 'http://piratupartija.lv/',
             __('Lithuania', 'ppi_sections' ) => 'http://piratupartija.lt/',
             __('Luxembourg', 'ppi_sections' ) => 'http://www.piratepartei.lu/',
             __('Mexico', 'ppi_sections' ) => 'http://www.partidopiratamexicano.org/',
             __('Netherlands', 'ppi_sections' ) => 'https://www.piratenpartij.nl/',
             __('New Zealand', 'ppi_sections' ) => 'http://pirateparty.org.nz/',
             __('Peru', 'ppi_sections' ) => 'http://wiki.freeculture.org/Pirata',
             __('Poland', 'ppi_sections' ) => 'https://polskapartiapiratow.pl/',
             __('Portugal', 'ppi_sections' ) => 'http://www.partidopiratapt.eu/',
             __('Romania', 'ppi_sections' ) => 'http://www.partidulpirat.ro/',
             __('Russia', 'ppi_sections' ) => 'http://pirate-party.ru/',
             __('Serbia', 'ppi_sections' ) => 'http://www.piratskapartija.com/',
             __('Sweden', 'ppi_sections' ) => 'https://www.piratpartiet.se/',
             __('Switzerland', 'ppi_sections' ) => 'https://www.piratenpartei.ch/',
             __('Slovakia', 'ppi_sections' ) => 'http://www.piratskastrana.sk/',
             __('Slovenia', 'ppi_sections' ) => 'http://www.piratskastranka.net/',
             __('Spain', 'ppi_sections' ) => 'http://www.partidopirata.es/',
             __('Turkey', 'ppi_sections' ) => 'http://www.korsanpartisi.org/',
             __('Ukraine', 'ppi_sections' ) => 'http://pp-ua.org/',
             __('Uruguay', 'ppi_sections' ) => 'http://partidopirata.org.uy/',
             __('United Kingdom', 'ppi_sections') => 'https://pirateparty.org.uk/',
             __('United States', 'ppi_sections' ) => 'http://pirate-party.us/',

         )
     ), 
      __('International (with flags)', 'ppi_sections' ) => array(
         'title' => __('Pirate Party International', 'ppi_sections' ),
         'url'  => 'http://www.pp-international.net/',
         'sublist' => array(
            '<span class="flagicon-au"></span> '. __('Australia', 'ppi_sections' ) => 'http://pirateparty.org.au/',
            '<span class="flagicon-at"></span> '. __('Austria', 'ppi_sections' ) => 'http://piratenpartei.at/',
            '<span class="flagicon-ar"></span> '. __('Argentina', 'ppi_sections' ) => 'http://www.partidopirata.com.ar/',
            '<span class="flagicon-by"></span> '. __('Belarus', 'ppi_sections' ) => 'http://pirates.by/',            
            '<span class="flagicon-be"></span> '. __('Beligium', 'ppi_sections' ) => 'https://pirateparty.be/',
            '<span class="flagicon-br"></span> '. __('Brazil', 'ppi_sections' ) => 'http://www.partidopirata.org/',
            '<span class="flagicon-ca"></span> '. __('Canada', 'ppi_sections' ) => 'http://www.piratepartyofcanada.com/',
            '<span class="flagicon-cl"></span> '. __('Chile', 'ppi_sections' ) => 'http://www.partidopirata.cl/',
            '<span class="flagicon-co"></span> '. __('Columbia', 'ppi_sections' ) => 'http://pp.interlecto.net/',
            '<span class="flagicon-hr"></span> '. __('Croatia', 'ppi_sections' ) => 'https://pirati.hr/',
            '<span class="flagicon-cy"></span> '. __('Cyprus', 'ppi_sections' ) => 'http://www.piratepartycyprus.com/',
            '<span class="flagicon-cz"></span> '. __('Czech Republic', 'ppi_sections' ) => 'http://www.ceskapiratskastrana.cz/',
            '<span class="flagicon-dk"></span> '. __('Denmark', 'ppi_sections' ) => 'http://piratpartiet.dk/',
            '<span class="flagicon-ee"></span> '. __('Estonia', 'ppi_sections' ) => 'http://piraadipartei.ee/',
            '<span class="flagicon-fi"></span> '. __('Finland', 'ppi_sections' ) => 'https://piraattipuolue.fi/',
            '<span class="flagicon-fr"></span> '. __('France', 'ppi_sections' ) => 'https://partipirate.org/',
            '<span class="flagicon-de"></span> '. __('Germany', 'ppi_sections' ) => 'https://www.piratenpartei.de/', 
            '<span class="flagicon-gr"></span> '. __('Greece', 'ppi_sections' ) => 'https://pirateparty.gr/',
            '<span class="flagicon-gt"></span> '. __('Guatemala', 'ppi_sections' ) => 'http://partidopirata.org.gt/',
            '<span class="flagicon-hu"></span> '. __('Hungary', 'ppi_sections' ) => 'http://kalozpart.org/',
            '<span class="flagicon-is"></span> '. __('Iceland', 'ppi_sections') => 'http://pirateparty.is/',
            '<span class="flagicon-il"></span> '. __('Israel', 'ppi_sections') => 'http://piratim.org/',
            '<span class="flagicon-it"></span> '. __('Italy', 'ppi_sections' ) => 'http://www.partito-pirata.it/',
            '<span class="flagicon-kz"></span> '. __('Kazakhstan', 'ppi_sections' ) => 'http://pirateparty.kz/',
            '<span class="flagicon-kr"></span> '. __('Korea, South', 'ppi_sections' ) => 'http://pirateparty.kr/',
            '<span class="flagicon-lv"></span> '. __('Latvia', 'ppi_sections' ) => 'http://piratupartija.lv/',
            '<span class="flagicon-lt"></span> '. __('Lithuania', 'ppi_sections' ) => 'http://piratupartija.lt/',
            '<span class="flagicon-lu"></span> '. __('Luxembourg', 'ppi_sections' ) => 'http://www.piratepartei.lu/',
            '<span class="flagicon-mx"></span> '. __('Mexico', 'ppi_sections' ) => 'http://www.partidopiratamexicano.org/',
            '<span class="flagicon-nl"></span> '. __('Netherlands', 'ppi_sections' ) => 'https://www.piratenpartij.nl/',
            '<span class="flagicon-nz"></span>  '. __('New Zealand', 'ppi_sections' ) => 'http://pirateparty.org.nz/',
            '<span class="flagicon-pe"></span> '. __('Peru', 'ppi_sections' ) => 'http://wiki.freeculture.org/Pirata',
            '<span class="flagicon-pl"></span> '. __('Poland', 'ppi_sections' ) => 'https://polskapartiapiratow.pl/',
            '<span class="flagicon-pt"></span> '. __('Portugal', 'ppi_sections' ) => 'http://www.partidopiratapt.eu/',
            '<span class="flagicon-ro"></span> '. __('Romania', 'ppi_sections' ) => 'http://www.partidulpirat.ro/',
            '<span class="flagicon-ru"></span> '. __('Russia', 'ppi_sections' ) => 'http://pirate-party.ru/',
            '<span class="flagicon-rs"></span> '. __('Serbia', 'ppi_sections' ) => 'http://www.piratskapartija.com/',
            '<span class="flagicon-se"></span> '. __('Sweden', 'ppi_sections' ) => 'https://www.piratpartiet.se/',
            '<span class="flagicon-ch"></span> '. __('Switzerland', 'ppi_sections' ) => 'https://www.piratenpartei.ch/',
            '<span class="flagicon-sk"></span> '. __('Slovakia', 'ppi_sections' ) => 'http://www.piratskastrana.sk/',
            '<span class="flagicon-si"></span> '. __('Slovenia', 'ppi_sections' ) => 'http://www.piratskastranka.net/',
            '<span class="flagicon-es"></span> '. __('Spain', 'ppi_sections' ) => 'http://www.partidopirata.es/',
            '<span class="flagicon-tr"></span> '. __('Turkey', 'ppi_sections' ) => 'http://www.korsanpartisi.org/',
            '<span class="flagicon-ua"></span> '. __('Ukraine', 'ppi_sections' ) => 'http://pp-ua.org/',
            '<span class="flagicon-uy"></span> '. __('Uruguay', 'ppi_sections' ) => 'http://partidopirata.org.uy/',
            '<span class="flagicon-uk"></span> '. __('United Kingdom', 'ppi_sections') => 'https://pirateparty.org.uk/',
            '<span class="flagicon-us"></span> '. __('United States', 'ppi_sections' ) => 'http://pirate-party.us/',             
         )
     ), 
     'Baden-Wuerttemberg' => array(
         'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Baden-W&uuml;rttemberg',
         'url'  => 'http://www.piratenpartei-bw.de/',
         'sublist' => array(
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Freiburg' => 'https://bzv-fr.piratenpartei-bw.de/',      
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Stuttgart' => 'http://www.piraten-bzv-stuttgart.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' T&uuml;bingen' => 'https://bzv.piratenpartei-tuebingen.de/',          
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' B&ouml;blingen' => 'https://wiki.piratenpartei.de/BW:Landkreis_B%C3%B6blingen/District Chapter',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Calw-Freudenstadt' => 'https://wiki.piratenpartei.de/BW:District Chapter_Calw-Freudenstadt',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Heidenheim' => 'http://www.piraten-heidenheim.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Heilbronn' => 'http://www.piratenpartei-heilbronn.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Karlsruhe Land' => 'http://piraten-ka-land.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Karlsruhe Stadt' => 'http://www.piraten-karlsruhe.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Ludwigsburg' => 'http://www.piratenpartei-ludwigsburg.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Mannheim' => 'http://piratenpartei-mannheim.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rastatt-Baden-Baden' => 'http://piraten-rastatt.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Ravensburg-Bodenseekreis' => 'http://www.piraten-rvfn.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Reutlingen-T&uuml;bingen' => 'http://piratenpartei-reutlingen-tuebingen.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rhein-Neckar/Heidelberg' => 'http://piraten-rnhd.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Schw&auml;bisch Hall' => 'http://www.kocher-jagst-piraten.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Stuttgart' => 'https://www.piratenpartei-stuttgart.de',
             __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Ulm/Alb-Donau-Kreis' => 'http://www.piratenpartei-ulm.de',            
         )
     ),  
     'Bayern' => array(
         'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Bayern',
         'url'  => 'http://www.piratenpartei-bayern.de/',
         'sublist' => array(
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Mittelfranken' => 'http://piraten-mfr.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Niederbayern' => 'http://niederbayern.piratenpartei-bayern.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Oberbayern' => 'http://oberbayern.piratenpartei.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Oberfranken' => 'http://piraten-oberfranken.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Oberpfalz' => 'http://oberpfalz.piratenpartei.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Schwaben' => 'http://www.piraten-schwaben.de/',
             __('<abbr title="District Association">DA</abbr>','ppi_sections').' Unterfranken' => 'https://piraten-ufr.de/',
         ) 
     ), 
    'Brandenburg' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Brandenburg',
        'url'  => 'http://www.piratenbrandenburg.de/',
        'sublist' => array(
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Potsdam' => 'https://potsdam.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Brandenburg an der Havel' => 'https://brb.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Havelland' => 'https://hvl.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' M&auml;rkisch-Oderland' => 'https://mol.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Oberhavel' => 'https://ohv.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Potsdam-Mittelmark' => 'https://pm.piratenbrandenburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Teltow-Fl&auml;ming' => 'https://tf.piratenbrandenburg.de/',
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Barnim-Uckermark' => 'https://barum.piratenbrandenburg.de/',
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Dahme-Oder-Spree' => 'https://dos.piratenbrandenburg.de/',
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Prignitz-Ruppin' => 'https://pr.piratenbrandenburg.de/',
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' S&uuml;dbrandenburg' => 'https://sued.piratenbrandenburg.de/',
        )
    ),
   
    
    'Hamburg' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Hamburg',
        'url'  => 'http://www.piratenpartei-hamburg.de/',
        'sublist' => array(
            __('<abbr title="District Association">DA</abbr>','ppi_sections').' Bergedorf' => 'http://www.piratenpartei-bergedorf.de/',
            __('<abbr title="District Association">DA</abbr>','ppi_sections').' Harburg' => 'http://www.piraten-harburg.de/',
            __('<abbr title="District Association">DA</abbr>','ppi_sections').' Hamburg-Nord' => 'https://wiki.piratenpartei.de/HH:Country Chapter_Nord',
            'Eimb&uuml;tteler Piraten' => 'https://wiki.piratenpartei.de/HH:Eimsb%C3%BCtteler_Piraten',
        )
    ),
    'Hessen' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Hessen',
        'url'  => 'http://www.piratenpartei-hessen.de/',
        'sublist' => array(
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bergstra&szlig;e' => 'http://www.piraten-bergstrasse.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Darmstadt/Darmstadt-Dieburg' => 'http://www.piratenpartei-darmstadt.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Frankfurt am Main' => 'http://www.piratenpartei-frankfurt.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Gie&szlig;en' => 'http://www.piraten-giessen.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Gross-Gerau' => 'http://www.piratenpartei-gross-gerau.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Hochtaunus' => 'http://www.piratenpartei-hochtaunus.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Kassel' => 'http://www.piratenpartei-kassel.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Main-Kinzig' => 'http://www.kinzigpiraten.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Main-Taunus' => 'http://www.piraten-mtk.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Marburg-Biedenkopf' => 'https://www.piratenpartei-marburg.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Odenwald' => 'http://www.piratenpartei-odenwald.de/',                                    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Offenbach-Land' => 'http://www.kreispiraten-of.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rheingau-Taunus' => 'http://www.piratenpartei-rtk.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Schwalm-Eder' => 'http://www.piraten-sek.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Waldeck-Frankenberg' => 'http://www.piraten-wa-fkb.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Wetterau' => 'http://www.piratenpartei-wetterau.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Wiesbaden' => 'http://www.piratenpartei-wiesbaden.de/',
        )
    ),
     'Mecklenburg-Vorpommern' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Mecklenburg-Vorpommern',
        'url'  => 'http://www.piratenpartei-mv.de/',
        'sublist' => array(
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Vorpommern-Greiswald' => 'http://piraten-hgw.de/',
            'Rostock' => 'http://rostock.piratenpartei-mv.de/',
            'Neubrandenburg' => 'http://piratenpartei-mv.de/stammtisch-neubrandenburg-0',
            'Schwerin' => 'http://www.schweriner-piraten.de/',
            'Usedom' => 'http://www.piraten-usedom.de/',
           
        )
    ),
   'Niedersachsen' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Niedersachsen',
        'url' => 'http://www.piraten-nds.de/',
        'sublist' => array(
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Braunschweig' => 'http://www.piratenpartei-braunschweig.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Celle' => 'http://www.piraten-celle.de/',    
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Delmenhorst' => 'http://www.piratenpartei-delmenhorst.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Diepholz' => 'http://www.piratenpartei-diepholz.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Goslar' => 'http://www.piraten-goslar.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' G&ouml;ttingen' => 'http://www.piratenpartei-goettingen.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Grafschaft Bentheim' => 'http://www.grafschafter-piraten.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Hameln-Pyrmont' => 'http://www.piraten-hameln.de/',    
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Hannover' =>'http://www.piratenhannover.de/', 
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Helmstedt' => 'https://wiki.piratenpartei.de/NDS:Helmstedt',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Hildesheim' => 'http://www.piratenpartei-hildesheim.de/',    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Niedersachsen-Nordost' => 'http://www.heide-piraten.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Nienburg/Weser' => 'http://www.piraten-nienburg.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Northeim' => 'http://www.piratenpartei-northeim.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Osnabr&uuml;ck' => 'https://www.piraten-osnabrueck.de',   
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Oldenburg' => 'https://www.piratenpartei-oldenburg.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Oldenburg Land' => 'http://www.piratenpartei-landkreis-oldenburg.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Osterholz' => 'http://www.piraten-ohz.de/', 	    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Osterode' => 'http://www.piratenpartei-osterode.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Peine' => 'http://wiki.piratenpartei.de/NDS:District Chapter_Peine',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Stade' => 'http://www.piraten-stade.de/',   
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Schaumburg' => 'http://www.piraten-schaumburg.de/',            
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Wolfenb&uuml;ttel-Salzgitter' => 'http://www.piratenpartei-wolfenbuettel.de/',   
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Wolfsburg' => 'http://wolfsburg.piratenpartei-nds.de/',   
      
        )
    ),    
    'Nordrhein-Westfalen' => array(
      'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Nordrhein-Westfalen',
      'url' => 'http://www.piratenpartei-nrw.de/',
      'sublist' => array(   
        
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bochum' =>'http://piratenbochum.de',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bonn' =>'https://piratenpartei-bonn.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Dortmund' =>'https://wiki.piratenpartei.de/NRW:Dortmund',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' D&uuml;sseldorf' =>'http://piratenpartei-duesseldorf.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' G&uuml;terslohe' =>'http://www.piratenpartei-guetersloh.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Hagen' =>'https://wiki.piratenpartei.de/NRW:Hagen/District Chapter',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Kleve' =>'https://wiki.piratenpartei.de/NRW:Kreis_Kleve',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' K&ouml;ln' =>'https://piratenpartei-koeln.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Krefeld' =>'https://wiki.piratenpartei.de/NRW:Krefeld/District Chapter',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Minden-L&uuml;bbecke' =>'https://wiki.piratenpartei.de/NRW:Kreis_Minden-L%C3%BCbbecke/District Chapter',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' M&uuml;nster' =>'http://www.piratenpartei-muenster.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rhein-Erft' =>'https://piratenpartei-rhein-erft.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rhein-Sieg-Kreis' =>'http://www.piratenpartei-rhein-sieg.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Soest' =>'http://www.piratenpartei-soest.de/',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Wesel' =>'https://wiki.piratenpartei.de/NRW:Kreis_Wesel',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bielefeld' =>'https://wiki.piratenpartei.de/NRW:Bielefeld',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Lippe' =>'https://wiki.piratenpartei.de/NRW:Kreis_Lippe',
         __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Herford' =>'https://wiki.piratenpartei.de/NRW:Kreis_Herford',

          )
    ),
      'Rheinland-Pfalz' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Rheinland-Pfalz',
        'url'  => 'http://www.piraten-rlp.de',
        'sublist' => array(
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Altenkirchen' => 'https://wiki.piratenpartei.de/RP:District Chapter_Altenkirchen',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Koblenz' => 'https://wiki.piratenpartei.de/RP:District Chapter_Koblenz',	    
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bad Kreuznach' => 'https://wiki.piratenpartei.de/District Chapter_Bad_Kreuznach',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Mittelhaardt' => 'http://www.piratenpartei-mittelhaardt.de',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rhein-Pfalz' => 'https://wiki.piratenpartei.de/RP:District Chapter_Rhein-Pfalz',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Rheinhessen' => 'https://wiki.piratenpartei.de/RP:District Chapter_Rheinhessen',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' S&uuml;dpfalz' => 'https://wiki.piratenpartei.de/RP:District Chapter_S%C3%BCdpfalz',
	    __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Trier/Trier-Saarburg' => 'http://piraten-trier.de',
	    __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Worms' => 'http://www.piraten-worms.de',
        )
    ),
      'Sachsen' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Sachsen',
        'url'  => 'http://piraten-sachsen.de/',
        'sublist' => array(
            __('<abbr title="Town Chapter">TC</abbr>','ppi_sections').' Dresden Neustadt' => 'http://www.neustadtpiraten.de/',          
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Bautzen' => 'http://www.piraten-bautzen.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Chemnitz' => 'http://www.piraten-chemnitz.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Dresden' => 'http://www.piraten-dresden.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Erzgebirge' => 'http://www.piraten-erzgebirge.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' G&ouml;rlitz' => 'http://www.piraten-goerlitz.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Leipzig' => 'http://www.piraten-leipzig.de',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Mei&szlig;en' => 'http://piraten-meissen.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Mittelsachsen' => 'http://www.piraten-mittelsachsen.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' SOE' => 'http://www.piraten-soe.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Vogtland' => 'http://www.piratenpartei-vogtland.de/',         
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Leipziger Umland' => 'http://www.piralum.de/',    
        )
    ),
      'Sachsen-Anhalt' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Sachsen-Anhalt',
        'url'  => 'http://www.piraten-lsa.de',
        'sublist' => array(
            __('<abbr title="Regional Chapter">RC</abbr>','ppi_sections').' Altmark' => 'http://www.piraten-altmark.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' B&ouml;rde' => 'http://www.piraten-boerde.de/',
            'Burgenlandkreis / Saalekreis' => 'https://www.piraten-lsa.de/regionen/burgenlandkreis-saalekreis',
            'Halle (Saale)' => 'http://www.piraten-halle.de/',
            'Harz' => 'http://piraten-harz.de/',
            'Magdeburg' => 'http://www.piraten-magdeburg.de/',
            'Mansfeld-S&uuml;dharz' => 'http://www.piraten-msh.de/',
            'Wittenberg' => 'http://piratenpartei-wittenberg.de/',
        )
    ),
      'Thueringen' => array(
        'title' => __('<abbr title="Country Association">CA</abbr>','ppi_sections').' Th&uuml;ringen',
        'url'  => 'http://www.piraten-thueringen.de/',
        'sublist' => array(
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Altenburger Land' => 'http://piraten-altenburger-land.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Wartburgkreis' => 'http://wartburgpiraten.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Erfurt' => 'http://www.piraten-erfurt.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Gera' => 'http://piraten-gera.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Gotha' => 'http://piraten-gotha.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Ilm-Kreis' => 'http://piraten-ilmkreis.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Schmalkalden-Meiningen' => 'http://piraten-schmalkalden-meiningen.de/',
            __('<abbr title="District Chapter">DC</abbr>','ppi_sections').' Jena' => 'https://jena.piraten-thueringen.de/',
        )
    ),
);


/**
 * Function to update the local index storage
 */
function ppi_sections_update_index($updateNow = false) {
	// Get current blacklist
	$ppi_index = get_option("ppi_sections_index", new stdClass());
	
	// Check if index exists or is outdated	if ( true == $updateNow || !isset( $ppi_index->nextUpdate ) || time() > $ppi_index->nextUpdate ):

	if ( true == $updateNow || !isset( $ppi_index->nextUpdate ) || time() > $ppi_index->nextUpdate ):
		// Basic update time, 30 mins
		$ppi_index->nextUpdate = time() + ( 60 * 30 );
		
		// Download new index
		$response = wp_remote_get(PPI_SECTIONS_INDEX_URL);

		// Check for errors
		if ( false == is_wp_error( $response ) && 200 == $response['response']['code'] && isset( $response['body'] ) ) {
			// Save new index
			$ppi_index->sites = array_filter(array_map('trim', explode(",", $response['body'])));
		
			// Set next update time
			$ppi_index->nextUpdate = time() + PPI_SECTIONS_UPDATE_DELTA;
                } else {
                    global $ppi_sections_fallbackindex;
                    $ppi_index->sites = $ppi_sections_fallbackindex;
                }
                        
		
		// Update local storage
		update_option("ppi_sections_index", $ppi_index);
	endif;
        $ppi_indexkey =  get_option("ppi_sections_indexkey");
        if ((!isset($ppi_indexkey)) || (empty($ppi_indexkey))) {
                update_option("ppi_sections_indexkey", PPI_SECTIONS_INDEXKEY);
        }
}
add_action("wp_footer", "ppi_sections_update_index");


/**
 * Install or update plugin
 */
function ppi_sections_install() {
	// Get a fresh blacklist
	ppi_sections_update_index(true);
}
register_activation_hook(__FILE__, 'ppi_sections_install');
/**
 * deactivate plugin
 */
function ppi_sections_uninstall() {
	delete_option( "ppi_sections_index" );
        delete_option("ppi_sections_indexkey");
}
register_deactivation_hook(__FILE__, 'ppi_sections_uninstall');

/*
 * 
 */
function ppi_sections_init() {
        load_plugin_textdomain('ppi_sections', '', dirname(plugin_basename(__FILE__)) ); 
        ppi_sections_update_index();
	$ppi_sections_path = plugin_dir_url( __FILE__ );
	if ( !is_admin() ) { // don't load this if we're in the backend
		wp_register_style( 'ppi_sections', $ppi_sections_path . 'ppi_sections.css' );
		wp_enqueue_style( 'ppi_sections' );
	}
}
add_action( 'init', 'ppi_sections_init' );



/**
 * Adds Newsletter_Widget widget.
 */
class ppi_sections_widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ppi_sections_widget', // Base ID
                        __( 'PPI Sections', 'ppi_sections' ),
			array( 'description' => __( 'List for several pirate party sections worldwide and in some countries', 'ppi_sections' ), ) // Args
		);
	}

	
	public function widget( $args, $instance ) {     
            $ppi_index = get_option("ppi_sections_index");
            
            extract( $args );
            $ppi_indexkey =  $instance['chose_section'] ;
            if ((!isset($ppi_indexkey)) || (empty($ppi_indexkey))) {
                $ppi_indexkey =  get_option("ppi_sections_indexkey");
            }
            echo $before_widget;
            $sites = $ppi_index->sites; 

            $title =   $sites[$ppi_indexkey]['title'];
            $url =   $sites[$ppi_indexkey]['url'];

              if ((isset($url)) && (strlen($url)>5)) {
                    echo $before_title.'<a href="'.$url.'">'.$title.'</a>'.$after_title;
              } else {
                    echo $before_title.$title.$after_title;
              }
              echo '<ul>';

              foreach($sites[$ppi_indexkey]['sublist'] as $i => $value) {
                   echo '<li><a href="'.$value.'">';                                                                                                        
                   echo $i.'</a></li>';
                   echo "\n";
             }            
             echo '</ul>';     

           echo $after_widget;            
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
                $instance['chose_section'] = strip_tags( $new_instance['chose_section'] );
		return $instance;
	}

	
	public function form( $instance ) {       
            ppi_sections_update_index(true);
		$ppi_indexkey = $instance[ 'chose_section' ];		                 
                if ((!isset($ppi_indexkey)) || (empty($ppi_indexkey))) {
                    $ppi_indexkey =  get_option("ppi_sections_indexkey");
                }
                $ppi_index = get_option("ppi_sections_index");
                $sites = $ppi_index->sites;
                echo "<select name=\"".$this->get_field_name( 'chose_section' )."\">\n";

                foreach($sites as $i => $value) {   
                    echo "\t\t\t\t";
                    echo '<option value="'.$i.'"';
                    if ( $i == $ppi_indexkey ) {
                        echo ' selected="selected"';
                    }                                                                                                                                                                
                    echo '>';
                    echo $sites[$i]['title'];
                      
                    echo '</option>';                                                                                                                                                              
                    echo "\n";                                            
                }  
                echo "</select><br>\n";                                   
                echo "\t\t\t";
                echo "<label for=\"".$this->get_field_name( 'chose_section' )."\">".__( 'Chose section.', 'ppi_sections' )."</label>\n";   
	}

} // endclass widget
//
// register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "ppi_sections_widget" );' ) );

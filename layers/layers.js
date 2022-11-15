ol.proj.proj4.register(proj4);
ol.proj.get("EPSG:4326").setExtent([100.300493, -0.963992, 100.583555, -0.833086]);
var wms_layers = [];


        var lyr_GoogleMaps_0 = new ol.layer.Tile({
            'title': 'Google Maps',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'http://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}'
            })
        });
var format_BATASKELURAHAN_1 = new ol.format.GeoJSON();
var features_BATASKELURAHAN_1 = format_BATASKELURAHAN_1.readFeatures(json_BATASKELURAHAN_1, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:4326'});
var jsonSource_BATASKELURAHAN_1 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_BATASKELURAHAN_1.addFeatures(features_BATASKELURAHAN_1);
var lyr_BATASKELURAHAN_1 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_BATASKELURAHAN_1, 
                style: style_BATASKELURAHAN_1,
                interactive: true,
                title: '<img src="styles/legend/BATASKELURAHAN_1.png" /> BATAS KELURAHAN'
            });
var format_KapasitasBanjir_2 = new ol.format.GeoJSON();
var features_KapasitasBanjir_2 = format_KapasitasBanjir_2.readFeatures(json_KapasitasBanjir_2, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:4326'});
var jsonSource_KapasitasBanjir_2 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_KapasitasBanjir_2.addFeatures(features_KapasitasBanjir_2);
var lyr_KapasitasBanjir_2 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_KapasitasBanjir_2, 
                style: style_KapasitasBanjir_2,
                interactive: true,
    title: 'Kapasitas Banjir<br />\
    <img src="styles/legend/KapasitasBanjir_2_0.png" /> 0,399 - 0,4277<br />\
    <img src="styles/legend/KapasitasBanjir_2_1.png" /> 0,4277 - 0,4563<br />\
    <img src="styles/legend/KapasitasBanjir_2_2.png" /> 0,4563 - 0,485<br />'
        });
var format_KerentananBanjir_3 = new ol.format.GeoJSON();
var features_KerentananBanjir_3 = format_KerentananBanjir_3.readFeatures(json_KerentananBanjir_3, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:4326'});
var jsonSource_KerentananBanjir_3 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_KerentananBanjir_3.addFeatures(features_KerentananBanjir_3);
var lyr_KerentananBanjir_3 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_KerentananBanjir_3, 
                style: style_KerentananBanjir_3,
                interactive: true,
    title: 'Kerentanan Banjir<br />\
    <img src="styles/legend/KerentananBanjir_3_0.png" /> 0,666 - 0,733<br />\
    <img src="styles/legend/KerentananBanjir_3_1.png" /> 0,733 - 0,799<br />\
    <img src="styles/legend/KerentananBanjir_3_2.png" /> 0,799 - 0,866<br />'
        });
var format_LuasBahayaBanjir_4 = new ol.format.GeoJSON();
var features_LuasBahayaBanjir_4 = format_LuasBahayaBanjir_4.readFeatures(json_LuasBahayaBanjir_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:4326'});
var jsonSource_LuasBahayaBanjir_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_LuasBahayaBanjir_4.addFeatures(features_LuasBahayaBanjir_4);
var lyr_LuasBahayaBanjir_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_LuasBahayaBanjir_4, 
                style: style_LuasBahayaBanjir_4,
                interactive: true,
    title: 'Luas Bahaya Banjir<br />\
    <img src="styles/legend/LuasBahayaBanjir_4_0.png" /> 0,682 - 0,73<br />\
    <img src="styles/legend/LuasBahayaBanjir_4_1.png" /> 0,73 - 0,778<br />\
    <img src="styles/legend/LuasBahayaBanjir_4_2.png" /> 0,778 - 0,826<br />'
        });

lyr_GoogleMaps_0.setVisible(true);lyr_BATASKELURAHAN_1.setVisible(true);lyr_KapasitasBanjir_2.setVisible(true);lyr_KerentananBanjir_3.setVisible(true);lyr_LuasBahayaBanjir_4.setVisible(true);
var layersList = [lyr_GoogleMaps_0,lyr_BATASKELURAHAN_1,lyr_KapasitasBanjir_2,lyr_KerentananBanjir_3,lyr_LuasBahayaBanjir_4];
lyr_BATASKELURAHAN_1.set('fieldAliases', {'WADMKD': 'WADMKD', 'WADMKC': 'WADMKC', 'WADMKK': 'WADMKK', });
lyr_KapasitasBanjir_2.set('fieldAliases', {'WADMKD': 'WADMKD', 'WADMKC': 'WADMKC', 'INDEKS KAPASITAS': 'INDEKS KAPASITAS', 'KELAS KAPASITAS': 'KELAS KAPASITAS', });
lyr_KerentananBanjir_3.set('fieldAliases', {'WADMKD': 'WADMKD', 'WADMKC': 'WADMKC', 'INDEKS KERENTANAN': 'INDEKS KERENTANAN', 'KELAS KERENTANAN': 'KELAS KERENTANAN', });
lyr_LuasBahayaBanjir_4.set('fieldAliases', {'WADMKD': 'WADMKD', 'WADMKC': 'WADMKC', 'INDEKS LUAS BANJIR': 'INDEKS LUAS BANJIR', 'KELAS LUAS BANJIR': 'KELAS LUAS BANJIR', 'INDEKS KERENTANAN': 'INDEKS KERENTANAN', 'KELAS KERENTANAN': 'KELAS KERENTANAN', 'INDEKS KAPASITAS': 'INDEKS KAPASITAS', 'KELAS KAPASITAS': 'KELAS KAPASITAS', });
lyr_BATASKELURAHAN_1.set('fieldImages', {'WADMKD': 'TextEdit', 'WADMKC': 'TextEdit', 'WADMKK': 'TextEdit', });
lyr_KapasitasBanjir_2.set('fieldImages', {'WADMKD': 'TextEdit', 'WADMKC': 'TextEdit', 'INDEKS KAPASITAS': 'TextEdit', 'KELAS KAPASITAS': 'TextEdit', });
lyr_KerentananBanjir_3.set('fieldImages', {'WADMKD': 'TextEdit', 'WADMKC': 'TextEdit', 'INDEKS KERENTANAN': 'TextEdit', 'KELAS KERENTANAN': 'TextEdit', });
lyr_LuasBahayaBanjir_4.set('fieldImages', {'WADMKD': 'TextEdit', 'WADMKC': 'TextEdit', 'INDEKS LUAS BANJIR': 'TextEdit', 'KELAS LUAS BANJIR': 'TextEdit', 'INDEKS KERENTANAN': 'TextEdit', 'KELAS KERENTANAN': 'TextEdit', 'INDEKS KAPASITAS': 'TextEdit', 'KELAS KAPASITAS': 'TextEdit', });
lyr_BATASKELURAHAN_1.set('fieldLabels', {'WADMKD': 'inline label', 'WADMKC': 'header label', 'WADMKK': 'inline label', });
lyr_KapasitasBanjir_2.set('fieldLabels', {'WADMKD': 'inline label', 'WADMKC': 'inline label', 'INDEKS KAPASITAS': 'no label', 'KELAS KAPASITAS': 'inline label', });
lyr_KerentananBanjir_3.set('fieldLabels', {'WADMKD': 'inline label', 'WADMKC': 'inline label', 'INDEKS KERENTANAN': 'no label', 'KELAS KERENTANAN': 'inline label', });
lyr_LuasBahayaBanjir_4.set('fieldLabels', {'WADMKD': 'inline label', 'WADMKC': 'header label', 'INDEKS LUAS BANJIR': 'inline label', 'KELAS LUAS BANJIR': 'inline label', 'INDEKS KERENTANAN': 'inline label', 'KELAS KERENTANAN': 'inline label', 'INDEKS KAPASITAS': 'inline label', 'KELAS KAPASITAS': 'inline label', });
lyr_LuasBahayaBanjir_4.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});
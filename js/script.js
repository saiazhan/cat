function init() {
  let map = new ymaps.Map('map', {
    center: [51.13862651264821,71.40487345301062],
    zoom: 18
  });


let placemark = new ymaps.Placemark([51.13862651264821,71.40487345301062],{}, {
  iconLayout: 'default#imageWithContent',
    iconImageHref: 'https://cdn-icons-png.flaticon.com/512/9131/9131546.png',
    iconImageSize: [20, 20],
    iconImageOffset: [-10, -19]
});

map.controls.remove('geolocationControl'); // удаляем геолокацию
  map.controls.remove('searchControl'); // удаляем поиск
  map.controls.remove('trafficControl'); // удаляем контроль трафика
  map.controls.remove('typeSelector'); // удаляем тип
  map.controls.remove('rulerControl'); // удаляем контрол правил
  // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)

	map.geoObjects.add(placemark);
}

ymaps.ready(init);
/**
 * В этом задании необходимо написать библиотеку, которая упростит работу с коллекцией однотипных объектов.

 Для управления коллекцией нужно реализовать три функции:

 query — функция, выполняющая запрос с заданными операциями;
 select— операция выбора необходимых полей объектов;
 filterIn— операция фильтрации объектов коллекции.

 * @param {Array} collection
 * @params {Function[]} – Функции для запроса
 * @returns {Array}
 */
function query(collection) {

  function copyColl(coll) {
    var newColl = [];
    for (var key in coll) {
      var row = Object.assign({}, coll[key]);
      newColl.push(row);
    }
    return newColl;
  }

  function sel(newColl, arr) {
    var keys = Object.keys(newColl[0]);
    arr.shift();

    var delKey = keys.filter(item => arr.includes(item) === false);

    return delKey;
  }

  function filterRows(newColl, arr) {
    if (arr[0] === 'filter') {
      var newArr = [];
      for (var key in newColl) {
        var i = 2;
        while (arr[i] !== undefined) {
          if (newColl[key][arr[1]] == arr[i]) {
            newArr.push(newColl[key]);
          }
          i++;
        }
      }
      return newArr;
    } else {
      var arr1 = sel(newColl, arr);
      for (var key in newColl) {
        var i = 0;
        while (arr1[i] !== undefined) {
          delete newColl[key][arr1[i]];
          i++;
        }
      }
      return newColl;
    }


  }

  var args = [].slice.call(arguments);
  var res = copyColl(collection);

  if (args.length === 1) {
    return res;
  }
  var oper = [];
  var i = 1;
  while (args[i] !== undefined) {
    oper.push(args[i]);
    i++;
  }

  oper.sort();

  var i = 0;
  while (oper[i] !== undefined) {
    res = filterRows(res, oper[i]);
    i++;
  }
  return res;

}

/**
 * @params {String[]}
 */
function select() {

  var args = [].slice.call(arguments);

  args.unshift('select');

  return args;
}

/**
 * @param {String} property – Свойство для фильтрации
 * @param {Array} values – Массив разрешённых значений
 */
function filterIn(property, values) {
  var a = [];
  a.push('filter');
  a.push(property);
  var filter = a.concat(values);
  return filter
}

this = {
  query: query,
  select: select,
  filterIn: filterIn
};

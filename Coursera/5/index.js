/**
 * В этом задании необходимо убрать повторения из списка хештегов и привести их к нижнему регистру.
 * Результатом должна быть строка. Хештеги в строке должны быть разделены запятой и пробелом: `tag1, tag2, tag3`.
 * @param {String[]} hashtags
 * @returns {String}
 */
module.exports = function (hashtags) {
  arr = [];
  hashtags.filter(filt);

  function filt(i) {
    if (arr.indexOf(i.toLowerCase()) === -1) {
      arr.push(i.toLowerCase());
    }

  }

  return arr.join(", ");

};

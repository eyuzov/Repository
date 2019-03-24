/**
 * В этом задании необходимо проверить, что числа составляют корректное время.
 * @param {Number} hours
 * @param {Number} minutes
 * @returns {Boolean}
 */
module.exports = function (hours, minutes) {
  if ((hours >= 0 && hours < 24) && (minutes >= 0 && minutes < 60)) {
    return true
  } else return false;

};

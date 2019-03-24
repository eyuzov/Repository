/**
 * В этом задании необходимо реализовать дополнительные функции для управления временем.
 * @param {String} date
 * @returns {Object}
 */
module.exports = function (date) {
  var date_obj = {
    year: 0,
    month: 0,
    day: 0,
    hour: 0,
    minute: 0,
    _value: ''
  };

  date_obj.year = date.match(/[\d]{4}/)[0];
  date_obj.month = date.match(/(\W[\d]{2})+/)[0].substr(1, 2);
  date_obj.month++;
  date_obj.day = date.match(/(\W[\d]{2})+/)[0].substr(4, 2);
  date_obj.hour = date.match(/\s[\d]{2}/)[0];
  date_obj.minute = date.match(/:[\d]{2}/)[0].substr(1, 2);

  var tmp = new Date(date_obj.year, date_obj.month, date_obj.day, date_obj.hour, date_obj.minute);
  var permissibleValues = ['years', 'months', 'days', 'hours', 'minutes'];
  Object.defineProperties(date_obj, {
    'add':
      {
        value: function (count, what) {
          if (!permissibleValues.includes(what)) {
            throw new TypeError();
          }
          if (count < 0) {
            throw new TypeError();
          }
          switch (what) {
            case 'years':
              tmp.setFullYear(+this.year + count);
              this.year = tmp.getFullYear();
              break;
            case 'months':
              tmp.setMonth(+this.month + count);
              this.month = tmp.getMonth();
              break;
            case 'days':
              tmp.setDate(+this.day + count);
              this.day = tmp.getDate();
              break;
            case 'hours':
              tmp.setHours(+this.hour + count);
              this.hour = tmp.getHours();
              break;
            case 'minutes':
              tmp.setMinutes(+this.minute + count);
              this.minute = tmp.getMinutes();
              break;
          }
          this.year = tmp.getFullYear();
          this.month = tmp.getMonth();
          this.day = tmp.getDate();
          this.hour = tmp.getHours();
          this.minute = tmp.getMinutes();

          return this
        }
      },
    'subtract':
      {
        value: function (count, what) {
          if (!permissibleValues.includes(what)) {
            throw new TypeError();
          }
          if (count < 0) {
            throw new TypeError();
          }
          switch (what) {
            case 'years':
              tmp.setFullYear(+this.year - count);
              this.year = tmp.getFullYear();
              break;
            case 'months':
              tmp.setMonth(+this.month - count);
              this.month = tmp.getMonth();
              break;
            case 'days':
              tmp.setDate(+this.day - count);
              this.day = tmp.getDate();
              break;
            case 'hours':
              tmp.setHours(+this.hour - count);
              this.hour = tmp.getHours();
              break;
            case 'minutes':
              tmp.setMinutes(+this.minute - count);
              this.minute = tmp.getMinutes();
              break;
          }
          this.year = tmp.getFullYear();
          this.month = tmp.getMonth();
          this.day = tmp.getDate();
          this.hour = tmp.getHours();
          this.minute = tmp.getMinutes();

          return this
        }
      },
    'value':
      {
        get: function () {
          this.month--;
          if (this.minute === 0) {
            this.minute = '00';
          } else if (this.minute < 10) {
            this.minute = '0' + this.minute;
          }
          if (this.hour < 10) {
            this.hour = '0' + this.hour;
          }
          if (this.month < 10) {
            this.month = '0' + this.month;
          }
          if (this.day < 10) {
            this.day = '0' + this.day;
          }

          this._value = this.year + '-' + this.month + '-' + this.day + ' ' +
            this.hour + ':' + this.minute;
          return this._value
        }

      }
  });
  return date_obj;
};

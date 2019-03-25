module.exports = {
  arr: [],
  /**
   * В этом задании необходимо реализовать библиотеку, позволяющую подписываться на события и получать по ним уведомления.

   В библиотеке нужно реализовать три метода:

   on — подписка на событие;
   off — отписка от события;
   emit — оповещение всех подписчиков.
   *
   *
   * @param {String} event
   * @param {Object} subscriber
   * @param {Function} handler
   */
  on: function (event, subscriber, handler) {
    this.arr.push({event, subscriber, handler});
    return this;
  },

  /**
   * @param {String} event
   * @param {Object} subscriber
   */
  off: function (event, subscriber) {
    var i = 0;
    while (this.arr[i] !== undefined) {
      if (this.arr[i].event === event && this.arr[i].subscriber === subscriber) {
        this.arr[i].event = "0";
      }
      i++;
    }
    return this;
  },

  /**
   * @param {String} event
   */
  emit: function (event) {
    var i = 0;
    while (this.arr[i] !== undefined) {
      if (this.arr[i].event === event) {
        this.arr[i].handler.call(this.arr[i].subscriber);
      }
      i++;
    }
    return this;
  }
};

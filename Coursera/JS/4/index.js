/**
 * В этом задании необходимо вернуть список хештегов, которые содержатся в твите.
 * @param {String} tweet
 * @returns {String[]}
 */
module.exports = function (tweet) {
  res = [];
  arr = tweet.split(" ")
    .forEach(isTweet);

  function isTweet(i) {
    if (i.startsWith("#")) {
      res.push(i.slice(1));
    }
  }
  return res;
};

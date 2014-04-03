using SocialChatDAL;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocialChatBusiness
{
    public class Business
    {
        private int _lastId = 0;

        #region Singleton

        private static Business _instance;
        public static Business Instance
        {
            get
            {
                lock (_lock)
                {
                    if (_instance == null)
                    {
                        _instance = new Business();
                    }
                }

                return _instance;
            }
        }

        private static readonly object _lock = new object();

        /// <summary>
        /// Construct
        /// </summary>
        private Business()
        {
        }

        

        #endregion

        /// <summary>
        /// Get new message from DB
        /// </summary>
        /// <returns>List<social_message></returns>
        public List<social_message> GetNewMessages()
        {
            var result = new List<social_message>();
            using (var db = new Entities())
            {
                result = db.social_message.Where(m => m.id > _lastId).ToList();
            }

            if (result.Any())
            {
                _lastId = result.Last().id;
            }

            return result;
        }

        /// <summary>
        /// Check fields and insert object in DB
        /// </summary>
        /// <param name="author"></param>
        /// <param name="message"></param>
        /// <returns></returns>
        public bool InsertMessage(string author, string message, out string errorMessage)
        {
            if (string.IsNullOrEmpty(author) || string.IsNullOrEmpty(message))
            {
                errorMessage = "All fields are required !";
                return false;
            }

            try
            {
                using (var db = new Entities())
                {
                    db.social_message.Add(new social_message { author = author, message = message });
                    db.SaveChanges();
                }

                errorMessage = "";
                return true;
            }
            catch (Exception e)
            {
                errorMessage = "An error occured";
                return false;
            }
        }
    }
}

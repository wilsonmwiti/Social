using SocialChatDAL;
using System;
using System.Collections.Generic;
using System.Linq;

namespace SocialChatBusiness
{
    public class Business
    {
        private int _lastId;

        #region Singleton

        private static Business _instance;
        public static Business Instance
        {
            get
            {
                lock (Lock)
                {
                    if (_instance == null)
                    {
                        _instance = new Business();
                    }
                }

                return _instance;
            }
        }

        private static readonly object Lock = new object();

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
        /// <returns>List</returns>
        public List<social_message> GetNewMessages()
        {
            var result = new List<social_message>();
            try
            {
                using (var db = new Entities())
                {
                    result = db.social_message.Where(m => m.id > _lastId).ToList();
                }

                if (result.Any())
                {
                    _lastId = result.Last().id;
                }
            }
            catch (Exception)
            {
            }

            return result;
        }

        /// <summary>
        /// Check fields and insert object in DB
        /// </summary>
        /// <param name="author"></param>
        /// <param name="message"></param>
        /// <param name="errorMessage"> </param>
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
            catch (Exception)
            {
                errorMessage = "An error occured";
                return false;
            }
        }
    }
}

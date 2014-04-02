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

        /// <summary>
        /// Get new message in the DB
        /// </summary>
        /// <returns>List<social_message></returns>
        public List<social_message> GetNewMessages()
        {
            var result = new List<social_message>();
            using(var entity = new socialEntities())
            {
                result = entity.social_message.Where(m => m.id > _lastId).ToList();
            }

            if (result.Any())
            {
                _lastId = result.Last().id;
            }

            return result;
        }
    }
}

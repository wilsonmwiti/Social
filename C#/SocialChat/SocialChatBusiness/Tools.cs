using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocialChatBusiness
{
    public class Tools
    {
        /// <summary>
        /// Determine File name with path
        /// </summary>
        /// <param name="completePath">File's path</param>
        /// <returns>File's name</returns>
        public static string DetectFileName(string completePath)
        {
            var parts = completePath.Split('/');
            var fileName = parts[parts.Length - 1];

            return fileName;
        }
    }
}

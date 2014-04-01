using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace SocialChatBusiness
{
    public class HtmlTools
    {
        /// <summary>
        /// Retrieve all image source with HTML string
        /// </summary>
        /// <param name="htmlSource"></param>
        /// <returns></returns>
        public static List<string> FetchImgSourceFromHtml(string htmlSource)
        {
            List<string> link = new List<string>();
            string regexImgSrc = @"<img[^>]*?src\s*=\s*[""']?([^'"" >]+?)[ '""][^>]*?>";
            MatchCollection matchesImgSrc = Regex.Matches(htmlSource, regexImgSrc, RegexOptions.IgnoreCase | RegexOptions.Singleline);
            foreach (Match m in matchesImgSrc)
            {
                string href = m.Groups[1].Value;
                link.Add(href);
            }
            return link;
        }

        /// <summary>
        /// Split an HTML string by HTML tags
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        public static List<string> SplitHtmlTags(string input)
        {
            string regexImgSrc = @"<[^>]+>|&nbsp;";
            string[] output = Regex.Split(input, regexImgSrc);

            return output.ToList();
        }

        /// <summary>
        /// Remove all HTML tags from HTML string
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        public static string RemoveHtmlTags(string input)
        {
            string regexImgSrc = @"<[^>]+>|&nbsp;";
            string output = Regex.Replace(input, regexImgSrc, "");

            return output;
        }

    }
}

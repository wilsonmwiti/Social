using System.Collections.Generic;
using System.Linq;
using System.Text.RegularExpressions;

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
            const string regexImgSrc = @"<img[^>]*?src\s*=\s*[""']?([^'"" >]+?)[ '""][^>]*?>";
            var matchesImgSrc = Regex.Matches(htmlSource, regexImgSrc, RegexOptions.IgnoreCase | RegexOptions.Singleline);
            return (from Match m in matchesImgSrc select m.Groups[1].Value).ToList();
        }

        /// <summary>
        /// Split an HTML string by HTML tags
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        public static List<string> SplitHtmlTags(string input)
        {
            const string regexImgSrc = @"<[^>]+>|&nbsp;";
            var output = Regex.Split(input, regexImgSrc);

            return output.ToList();
        }

        /// <summary>
        /// Remove all HTML tags from HTML string
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        public static string RemoveHtmlTags(string input)
        {
            const string regexImgSrc = @"<[^>]+>|&nbsp;";
            var output = Regex.Replace(input, regexImgSrc, "");

            return output;
        }

    }
}

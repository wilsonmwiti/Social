using SocialChatBusiness;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace SocialChat.userControl
{
    /// <summary>
    /// Logique d'interaction pour MessageUserControl.xaml
    /// </summary>
    public partial class MessageUserControl : UserControl
    {
        #region Attributs

        private string _author;
        private string _originalMessage;
        private List<string> _messageComponents;
        private List<Image> _emoticons;

        public string OriginalMessage
        {
            get
            {
                return OriginalMessage;
            }
            set 
            {
                _originalMessage = value;
                _messageComponents = HtmlTools.SplitHtmlTags(_originalMessage);

                var imgPaths = HtmlTools.FetchImgSourceFromHtml(_originalMessage);
                foreach (var imgPath in imgPaths)
                {
                    var imgName = Tools.DetectFileName(imgPath);

                    var bitmap = new BitmapImage(new Uri(string.Format("/images/emoticons/{0}", imgName), UriKind.Relative));
                    var img = new Image();
                    img.Width = 15;
                    img.Height = 15;
                    img.Source = bitmap;
                    img.Visibility = Visibility.Visible;

                    _emoticons.Add(img);
                }
            } 
        }

        #endregion

        #region Construct

        /// <summary>
        /// Construct
        /// </summary>
        public MessageUserControl(string author)
        {
            InitializeComponent();

            _author = author;
            _messageComponents = new List<string>();
            _emoticons = new List<Image>();
        }

        #endregion

        #region Public Methods

        /// <summary>
        /// Render displaying Message
        /// </summary>
        /// <returns>UIElement</returns>
        public UIElement Display()
        {
            var labelAuthor = new Label();
            labelAuthor.Content = string.Format("{0} : ", _author);

            var panel = new StackPanel();
            panel.Orientation = Orientation.Horizontal;
            panel.Children.Add(labelAuthor);

            var i = 0;
            foreach (var img in _emoticons)
            {
                var label = new Label();
                label.Content = _messageComponents[i] ?? "";

                panel.Children.Add(label);
                panel.Children.Add(img);
                i++;
            }

            if (_messageComponents.Count > 1)
            {
                var label = new Label();
                label.Content = _messageComponents[_messageComponents.Count - 1] ?? "";
                panel.Children.Add(label);
            }

            return panel;
        }

        #endregion
    }
}

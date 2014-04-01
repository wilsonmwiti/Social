using SocialChatBusiness;
using System;
using System.Collections.Generic;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Media.Imaging;

namespace SocialChat.userControl
{
    /// <summary>
    /// Logique d'interaction pour MessageUserControl.xaml
    /// </summary>
    public partial class MessageUserControl : UserControl
    {
        #region Attributs

        private readonly string _author;
        private string _originalMessage;
        private List<string> _messageComponents;
        private readonly List<Image> _emoticons;

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
                    var img = new Image {Width = 15, Height = 15, Source = bitmap, Visibility = Visibility.Visible};

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
            var labelAuthor = new Label {Content = string.Format("{0} : ", _author)};

            var panel = new StackPanel {Orientation = Orientation.Horizontal};
            panel.Children.Add(labelAuthor);

            var i = 0;
            foreach (var img in _emoticons)
            {
                var label = new Label {Content = _messageComponents[i] ?? ""};

                panel.Children.Add(label);
                panel.Children.Add(img);
                i++;
            }

            if (_messageComponents.Count > 1)
            {
                var label = new Label {Content = _messageComponents[_messageComponents.Count - 1] ?? ""};
                panel.Children.Add(label);
            }

            return panel;
        }

        #endregion
    }
}

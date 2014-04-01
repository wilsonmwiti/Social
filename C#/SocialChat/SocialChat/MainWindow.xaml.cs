using SocialChat.userControl;
using SocialChatBusiness;
using SocialChatDAL;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.IO;
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

namespace SocialChat
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        #region Attributs

        private ObservableCollection<social_message> _messages;

        #endregion

        #region Construct

        /// <summary>
        /// Consttruct
        /// </summary>
        public MainWindow()
        {
            InitializeComponent();

            try
            {
                socialEntities entity = new socialEntities();
                //_messages = new ObservableCollection<social_message>(entity.social_message.ToList());
                //MessagesList.ItemsSource = _messages;

                foreach(var m in entity.social_message.ToList())
                {
                    var userControl = new MessageUserControl(m.author);
                    userControl.OriginalMessage = m.message;
                    var panel = userControl.Display();
                    MainPanel.Children.Add(panel);
                }
            }
            catch (Exception)
            {
            }
        }

        #endregion
    }
}
